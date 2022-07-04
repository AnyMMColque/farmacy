<?php

namespace App\Models;

use App\Models\User;
use App\Models\Branch;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    protected $guard = ['created_at', 'updated_at'];

    use HasFactory;

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity', 'price');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    /**
     * Genera código de control
     * @param invoiceId integer id de factura
     * @param ci integer C.I. o NIT del cliente
     * @param date cadena fecha de la venta en formato 'YY:mm:dd' (20080519)
     * @param amount float total de venta
     * @param dosageKey llave de dosificación otorgada por impuestos
     * @param authorizationNumber integer numero de autorización de la farmacia
     */
    public function roundUp($value){        
        //reemplaza (,) por (.)        
        // $value2 = str_replace(',','.',$value);
        //redondea a 0 decimales        
        return round($value, 0, PHP_ROUND_HALF_UP);
    }

    public function controlCode($invoiceId, $ci, $date, $amount, $dosageKey, $authorizationNumber) {
        //redondea monto de transaccion 
        $roundedAmount = $this->roundUp($amount);

        /* ========== PASO 1 ============= */
        $invoiceNumber = ControlCode::addVerhoeffDigit($invoiceId,2);
        $nitci = ControlCode::addVerhoeffDigit($ci,2);
        $dateOfTransaction = ControlCode::addVerhoeffDigit($date,2);
        $transactionAmount = ControlCode::addVerhoeffDigit($roundedAmount,2);
    
        //se suman todos los valores obtenidos
        $sumOfVariables = $invoiceNumber
        + $nitci
        + $dateOfTransaction
        + $transactionAmount;
        //A la suma total se añade 5 digitos Verhoeff
        $sumOfVariables5Verhoeff = ControlCode::addVerhoeffDigit($sumOfVariables,5);
    
        /* ========== PASO 2 ============= */   
        $fiveDigitsVerhoeff = substr($sumOfVariables5Verhoeff,strlen($sumOfVariables5Verhoeff)-5);        
        $numbers = str_split($fiveDigitsVerhoeff);
        for($i=0;$i<5;$i++){
            $numbers[$i] = $numbers[$i] + 1;             
        }
                
        $string1 = substr($dosageKey,0, $numbers[0] );
        $string2 = substr($dosageKey,$numbers[0], $numbers[1] );
        $string3 = substr($dosageKey,$numbers[0]+ $numbers[1], $numbers[2] );
        $string4 = substr($dosageKey,$numbers[0]+ $numbers[1]+ $numbers[2], $numbers[3] );
        $string5 = substr($dosageKey,$numbers[0]+ $numbers[1]+ $numbers[2]+ $numbers[3], $numbers[4] );        
    
        $authorizationNumberDKey = $authorizationNumber . $string1;
        $invoiceNumberdKey = $invoiceNumber . $string2;
        $NITCIDKey = $nitci . $string3;
        $dateOfTransactionDKey = $dateOfTransaction . $string4;        
        $transactionAmountDKey = $transactionAmount . $string5;
    
        /* ========== PASO 3 ============= */        
        //se concatena cadenas de paso 2
        $stringDKey = $authorizationNumberDKey . $invoiceNumberdKey . $NITCIDKey . $dateOfTransactionDKey . $transactionAmountDKey;         
        //Llave para cifrado + 5 digitos Verhoeff generado en paso 2
        $keyForEncryption = $dosageKey . $fiveDigitsVerhoeff;              
        //se aplica AllegedRC4
        $allegedRC4String = AllegedRC4::encryptMessageRC4($stringDKey, $keyForEncryption,true);
    
        /* ========== PASO 4 ============= */
        //cadena encriptada en paso 3 se convierte a un Array         
        $chars = str_split($allegedRC4String);
        //se suman valores ascii
        $totalAmount=0;
        $sp1=0;
        $sp2=0;
        $sp3=0;
        $sp4=0;
        $sp5=0;
                
        $tmp=1;
        for($i=0; $i<strlen($allegedRC4String);$i++){
            $totalAmount += ord($chars[$i]);
            switch($tmp){
                case 1: $sp1 += ord($chars[$i]); break;
                case 2: $sp2 += ord($chars[$i]); break;
                case 3: $sp3 += ord($chars[$i]); break;
                case 4: $sp4 += ord($chars[$i]); break;
                case 5: $sp5 += ord($chars[$i]); break;
            }            
            $tmp = ($tmp<5)?$tmp+1:1;
        }
    
        /* ========== PASO 5 ============= */    
        //suma total * sumas parciales dividido entre resultados obtenidos 
        //entre el dígito Verhoeff correspondiente más 1 (paso 2)
        $tmp1 = floor($totalAmount*$sp1/$numbers[0]);
        $tmp2 = floor($totalAmount*$sp2/$numbers[1]);
        $tmp3 = floor($totalAmount*$sp3/$numbers[2]);
        $tmp4 = floor($totalAmount*$sp4/$numbers[3]);
        $tmp5 = floor($totalAmount*$sp5/$numbers[4]);
        //se suman todos los resultados
        $sumProduct = $tmp1 + $tmp2 + $tmp3 + $tmp4 + $tmp5;        
        //se obtiene base64
        $base64SIN = Base64SIN::convert($sumProduct);
    
        /* ========== PASO 6 ============= */        
        //Aplicar el AllegedRC4 a la anterior expresión obtenida
        $test = AllegedRC4::encryptMessageRC4($base64SIN, $dosageKey.$fiveDigitsVerhoeff);

        
    
        return $test;
    }
}

class Verhoeff
{

    static public $d = array(
        array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9),
        array(1, 2, 3, 4, 0, 6, 7, 8, 9, 5),
        array(2, 3, 4, 0, 1, 7, 8, 9, 5, 6),
        array(3, 4, 0, 1, 2, 8, 9, 5, 6, 7),
        array(4, 0, 1, 2, 3, 9, 5, 6, 7, 8),
        array(5, 9, 8, 7, 6, 0, 4, 3, 2, 1),
        array(6, 5, 9, 8, 7, 1, 0, 4, 3, 2),
        array(7, 6, 5, 9, 8, 2, 1, 0, 4, 3),
        array(8, 7, 6, 5, 9, 3, 2, 1, 0, 4),
        array(9, 8, 7, 6, 5, 4, 3, 2, 1, 0)
    );

    static public $p = array(
        array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9),
        array(1, 5, 7, 6, 2, 8, 3, 0, 9, 4),
        array(5, 8, 0, 3, 7, 9, 6, 1, 4, 2),
        array(8, 9, 1, 6, 0, 4, 3, 5, 2, 7),
        array(9, 4, 5, 3, 1, 2, 6, 8, 7, 0),
        array(4, 2, 8, 6, 5, 7, 3, 9, 0, 1),
        array(2, 7, 9, 3, 8, 0, 6, 4, 1, 5),
        array(7, 0, 4, 6, 9, 1, 3, 2, 5, 8)
    );

    static public $inv = array(0, 4, 3, 2, 1, 5, 6, 7, 8, 9);

    static function calc($num)
    {
        if (!preg_match('/^[0-9]+$/', $num)) {
            throw new \InvalidArgumentException(sprintf(
                "Error! Value is restricted to the number, %s is not a number.",
                $num
            ));
        }

        $r = 0;
        foreach (array_reverse(str_split($num)) as $n => $N) {
            $r = self::$d[$r][self::$p[($n + 1) % 8][$N]];
        }
        return self::$inv[$r];
    }

    static function check($num)
    {
        if (!preg_match('/^[0-9]+$/', $num)) {
            throw new \InvalidArgumentException(sprintf(
                "Error! Value is restricted to the number, %s is not a number.",
                $num
            ));
        }

        $r = 0;
        foreach (array_reverse(str_split($num)) as $n => $N) {
            $r = self::$d[$r][self::$p[$n % 8][$N]];
        }
        return $r;
    }

    static function generate($num)
    {
        return sprintf("%s%s", $num, self::calc($num));
    }

    static function validate($num)
    {
        return self::check($num) === 0;
    }
}

class AllegedRC4
{

    /**
     * Retorna mensaje encriptado
     * @param message mensaje a encriptar
     * @param key llave para encriptar
     * @param unscripted sin guion TRUE|FALSE
     * @return String mensaje encriptado
     */
    static function encryptMessageRC4($message, $key, $unscripted = false)
    {
        $state = range(0, 255);
        $x = 0;
        $y = 0;
        $index1 = 0;
        $index2 = 0;
        $nmen = "";
        $messageEncryption = "";

        for ($i = 0; $i <= 255; $i++) {
            //Index2 = ( ObtieneASCII(key[Index1]) + State[I] + Index2 ) MODULO 256
            $index2 =  (ord($key[$index1]) +  $state[$i] + $index2) % 256;
            //IntercambiaValor( State[I], State[Index2] )
            $aux = $state[$i];
            $state[$i] = $state[$index2];
            $state[$index2] = $aux;
            //Index1 = (Index1 + 1) MODULO LargoCadena(Key)
            $index1 = ($index1 + 1) % strlen($key);
        }
        //PARA I = 0 HASTA LargoCadena(Mensaje)-1 HACER
        for ($i = 0; $i < strlen($message); $i++) {
            //X = (X + 1) MODULO 256
            $x = ($x + 1) % 256;
            //Y = (State[X] + Y) MODULO 256
            $y = ($state[$x] + $y) % 256;
            //IntercambiaValor( State[X] , State[Y] )
            $aux = $state[$x];
            $state[$x] = $state[$y];
            $state[$y] = $aux;
            //NMen = ObtieneASCII(Mensaje[I]) XOR State[(State[X] + State[Y]) MODULO 256]
            $nmen = (ord($message[$i])) ^ $state[($state[$x] + $state[$y]) % 256];
            //MensajeCifrado = MensajeCifrado + "-" + RellenaCero(ConvierteAHexadecimal(NMen))            
            $nmenHex = strtoupper(dechex($nmen));
            $messageEncryption = $messageEncryption . (($unscripted) ? "" : "-") . ((strlen($nmenHex) == 1) ? ('0' . $nmenHex) : $nmenHex);
        }
        return (($unscripted) ? $messageEncryption : substr($messageEncryption, 1, strlen($messageEncryption)));
    }
} //end:class

class Base64SIN
{

    static function convert($value)
    {
        $dictionary = array(
            "0", "1", "2", "3", "4", "5", "6", "7", "8", "9",
            "A", "B", "C", "D", "E", "F", "G", "H", "I", "J",
            "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T",
            "U", "V", "W", "X", "Y", "Z", "a", "b", "c", "d",
            "e", "f", "g", "h", "i", "j", "k", "l", "m", "n",
            "o", "p", "q", "r", "s", "t", "u", "v", "w", "x",
            "y", "z", "+", "/"
        );
        $quotient = 1;
        $word = "";
        while ($quotient > 0) {
            $quotient = floor($value / 64);
            $remainder = $value % 64;
            $word = $dictionary[$remainder] . $word;
            $value = $quotient;
        }
        return $word;
    }
}

class ControlCode
{
    /**
     * Añade N digitos Verhoeff a una cadena de texto
     * @param value String
     * @param max numero de digitos a agregar
     * @return String cadena original + N digitos Verhoeff
     */
    static function addVerhoeffDigit($value, $max)
    {
        for ($i = 1; $i <= $max; $i++) {
            $value .= Verhoeff::calc($value);
        }
        return $value;
    }

    /**
     * Redondea hacia arriba
     * @param value cadena con valor numerico de la forma 123 123.4 123,4
     */
    function roundUp($value)
    {
        //reemplaza (,) por (.)        
        $value2 = str_replace(',', '.', $value);
        //redondea a 0 decimales        
        return round($value2, 0, PHP_ROUND_HALF_UP);
    }

    function validateNumber($value)
    {
        if (!preg_match('/^[0-9,.]+$/', $value)) {
            throw new InvalidArgumentException(sprintf("Error! Valor restringido a número, %s no es un número.", $value));
        }
    }

    function validateDosageKey($value)
    {
        if (!preg_match('/^[A-Za-z0-9=#()*+-_\@\[\]{}%$]+$/', $value)) {
            throw new InvalidArgumentException(sprintf("Error! llave de dosificación,<b> %s </b>contiene caracteres NO permitidos.", $value));
        }
    }
}

// $control = new Order();
// echo $control->controlCode(876814, 1665979, "20080519", 35958.60, 'zZ7Z]xssKqkEf_6K9uH(EcV+%x+u[Cca9T%+_$kiLjT8(zr3T9b5Fx2xG-D+_EBS', 7904006306693);
