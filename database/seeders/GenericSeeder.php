<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenericSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ["Nombre Genérico","ACETAMINOFENO","ACETIL CISTEINA","ACETILCISTEINA","ACETILCISTEÍNA","ACIDO  ASCORBICO","ACIDO ACETIL SALICILICO","ÁCIDO ACETIL SALICÍLICO","ACIDO ACETILSALICILICO","ACIDO ASCORBICO","ACIDO ASCORBICO (VIT. C)","ACIDO ASCORBICO (VITAMINA C)","ACIDO ASCORBICO  VITAMINA C","ALCANFOR;ACEITES ESENCIALES; ESENCIA TREMENTINA...","ALCOHOL ETILICO","ALCOHOL MEDICINAL","AMOXICILINA - ACIDO CLAVULANICO","AMOXICILINA    ACIDO CLAVULANICO","AMOXICILINA   ACIDO CLAVULANICO","AMOXICILINA + AC CLAVULANICO","AMOXICILINA + ACIDO CLAVULANICO","AMOXICILINA + ÁCIDO CLAVULÁNICO","AMOXICILINA + CLAVULANATO  DE POTASIO","AMOXICILINA + SULBACTAM","AMOXICILINA -SULBACTAM","AMOXICILINA TRIHIDRATO, CLAVULANATO POTASICO","AMOXICILINA TRIHIDRATO; ACIDO CLAVULANICO","AMOXICILINA TRIHIDRATO; SULBACTAM PIVOXIL","AMOXICILINA, AC. CLAVULANICO","AMOXICILINA;  ACIDO CLAVULANICO","AMOXICILINA; ACIDO CLAVULANICO","AMOXICILINA; CLAVULANATO DE POTASIO","AMOXICILINA+ACIDO CLAVULANICO","AMOXICILINA-ACIDO CLAVULANICO","ATRACURIO BESILATO","AZITROMICINA","AZITROMICINA (ANHIDRA) USP","AZITROMICINA (EQUIV. A AZITROMICINA DIHIDRATO)","AZITROMICINA ANHIDRA","AZITROMICINA DIHIDRATADO","AZITROMICINA DIHIDRATO","BETAMETASONA","BETAMETASONA SODIO FOSFATO","BICARBONATO DE SODIO","CEFIXIMA","CEFIXIMA TRIHIDRATO","CEFIXIMA BASE","CEFIXIMA ANHIDRA","CEFTRIAXONA","CEFTRIAXONA (SÓDICA)","CEFTRIAXONA SODICA","CEFTRIAXONA(COMO CEFTRIAXONA SÓDICA)","CLARITROMICINA","CLORHEXIDINA GLUCONATO","CODEINA FOSFATO","CODEINA FOSFATO HEMIHIDRATO","COLECALCIFEROL","COMPLEJO B-B1-B6-B12","COMPLEMENTO VITAMINICO Y MINERAL","COTRIMOXAZOL (SULFAMETOXAZOL + TRIMETOPRIM)","COTRIMOXAZOL (SULFAMETOXAZOL- TRIMETOPRIMA)","DEXAMETASONA","DEXAMETASONA 0,5 MG","DEXAMETASONA 4MG(DEXAMETAS. SODIO FOSFATO 4.391MG)","DEXAMETASONA FOSFATO","DEXAMETASONA FOSFATO SODICO","DEXTROMETORFANO","DEXTROMETORFANO BROMHIDRATO","DEXTROMETORFANO BROMHIDRATO MONOHIDRATO","DEXTROMETORFANO BROMHIDRTO","DEXTROMETORFANO BROMIIDRATO","DICLOFENACO","DICLOFENACO  SÓDICO","DICLOFENACO 75 MG","DICLOFENACO DE SODIO","DICLOFENACO POTASICO","DICLOFENACO SODICO","DICLOFENACO SODICO BP","ENOXAPARINA SODICA","EUCALIPTOL, MENTOL, ALCANFOR, SALVIA, MANZANILLA","EUCALIPTOL; ALCANFOR; MENTOL","EUCALIPTOL;MENTOL;ALCAN FOR;ACEITE DE SALVIA","FENTANIL","FENTANILO CITRATO","FENTANILO CITRATO (CON CONSERVANTE)","FENTANILO CITRATO (SIN CONSERVANTE)","HEPARINA SODICA","HIDROXICLOROQUINA SULFATO","IBUPROFENO","IBUPROFENO 400 MG","IVERMECTINA","KETAMINA CLORHIDRATO","LEVOFLOXACINA","LEVOFLOXACINA COMO HEMIDRATO","LEVOFLOXACINA HEMIHIDRATADA","LEVOFLOXACINA HEMIHIDRATO","LEVOFLOXACINO","Levofloxacino Hemihidrato","LEVOFLOXACINO HEMIHIDRATO","MENTOL; ALCANFOR, EUCALIPTOL","MENTOL; ALCANFOR; EUCALIPTOL","METAMIZOL SODICO","METILPREDNISOLONA","METILPREDNISOLONA HEMISUCCINATO","METILPREDNISOLONA SODICA SUCCINATO","MIDAZOLAM","MIDAZOLAM CLORHIDRATO","MULTIVITAMINAS","MULTIVITAMINICO","NITAXOZANIDA","NITAZOXANIDA","NITAZOXANIDA 100 MG   5 ML","OMEPRAZOL","OMEPRAZOL SODICO","OXIGENO MEDICINAL","PARACET  D-ISOEFEDRINA CLORF.MALEATO  AC. ASCORBICO","PARACET; FENILEFRINA;CLORFENIRAMI NA","PARACET;NOSCAP;CAFEINA; ASCORBATO DE NA,CLORF.","PARACETAMOL","PARACETAMOL (ACETAMINOFENO)","PARACETAMOL CLORFENIRAMINA DEXTROMETORFANO","PARACETAMOL D- ISOEFEDRINA CLORHIDRATO, VIT. C","Paracetamol jarabe","PARACETAMOL, DEXTROMETORFANO, 
            FENILEFRINA","PARACETAMOL, NOSCAPINA, CAFEINA, AC.ASCORBICO","PARACETAMOL, PSEUDOEFEDRINA Y CLORFENIRAMINA","PARACETAMOL, PSEUDOEFEDRINA, CLORFENAMINA","PARACETAMOL, PSEUDOEFEDRINA, CLORFENIRAMINA","PARACETAMOL, PSEUDOEFEDRINA; CLORFENIRAMINA","PARACETAMOL,CLORFENIRA MINA MALEATO; FENILEFRINA CL","PARACETAMOL,CLORFENIRA MINA,DEXTROMETORFANO,P SEUDOE","PARACETAMOL,CLORFENIRA MINA;EUCALIPTOL;GOMENOL","PARACETAMOL,CLORHIDRAT O DE PSEUDOEFEDRINA,MALEATO","PARACETAMOL   DEXTROMETORFANO   CLORFENAMINA  FENILE","PARACETAMOL  FENILEFRINA CLORHIDRATO  CLORF. MALEATO","PARACETAMOL  PSEUDOEFED RINA SULFATO  CLORFENIRAMINA","PARACETAMOL; CAFEINA; DIFENHIDRAMINA CLORH.","PARACETAMOL; D- ISOEFEDRINA CLORHIDRATO; VIT C;CLOR","PARACETAMOL; FENILEFRINA;","PARACETAMOL; PSEUDOEFED.; CLORFENIRAM.; DEXTROMET.","PARACETAMOL; PSEUDOEFEDRINA CLORH; CLORFENIRAMINA","PARACETAMOL; PSEUDOEFEDRINA HCL; CLORFENIRAMINA MA","PARACETAMOL; PSEUDOEFEDRINA; CLORFENAMINA","PARACETAMOL; PSEUDOEFEDRINA; 
            CLORFENIRAMINA","PARACETAMOL; PSEUDOEFEDRINA; CLORFENIRAMINA; DEXTR","PARACETAMOL;CLORFENIRA MINA;PSEUDOEFEDRINA,DEX TROM","PARACETAMOL;D- ISOEFEDRINA;VIT.C","PARACETAMOL;FENILEFEDRI NA CLORHIDR;CAFEINA ANHIDRA","PARACETAMOL;FENILEFRINA CLORH;CLORFENIRAMINA","PARACETAMOL;FENILEFRINA; CAFEINA;CLORFENIRAMINA","PARACETAMOL;PSEDOEFEDR INA HCL; CLORFENAMINA MALEAT","PARACETAMOL;PSEUDOEFED RINA CL.;CLORFENIRAMINA;....","PARACETAMOL;PSEUDOEFED RINA; CLORFENAMINA","PARACETAMOL;PSEUDOEFED RINA;CLORFENIRAMINA,DEXT ROM","PARACETAMOL;PSEUDOEFED RINA;VIT C;CLORFENIRAMINA","PARACETAMOL;PSEUDOEFED RINA;VITAMINA C;LORATADINA","PARACETAMOL+CAFEINA+ PSEUDOEFEDRINA+DEXTRO METORFAN","PARACETAMOL+CAFEINA+FE NILEFRINA HCL+CLORFENIRAMINA","PARACETAMOL+NOSCAPINA CLORHIDRATO+CAFEINA ANHIDRA+","PARACETAMOL+PSEUDOEFE DRINA + CLORFENIRAMINA+DEXTRO","PARACETAMOL- CLORFENAMINA MALEATO- PSEUDOEFEDRINA","PARACETAMOL-FENILEFRINA HCL-DEXTROMETORFANO HBR","PARACETAMOL- PSEUDOEFEDRINA- CLORFENAMINA","PIRIDONIO CLORURO(ESTER ALIF. DE CL. DE PIRIDONIO)","PREDNISONA","PROPOFOL","ROCURONIO BROMURO","SALBUTAMOL","SALBUTAMOL SULFATO","Salbutamol sulfato","SOLUCIÓN ÁCIDA","SOLUCIÓN BÁSICA (BICARBONATO DE SODIO)","SULFAMETOXAZOL    TRIMETOPRIMA","SULFAMETOXAZOL + TRIMETOPRIMA","SULFAMETOXAZOL + TRIMETROPRIMA","SULFAMETOXAZOL- TRIMETOPRIMA","SULFAMETOXAZOL, TRIMETOPRIMA","SULFAMETOXAZOL,TRIMETO PRIMA","SULFAMETOXAZOL  TRIMETO PRIMA","SULFAMETOXAZOL; TRIMETOPRIM","SULFAMETOXAZOL; TRIMETOPRIMA","SULFAMETOXAZOL+ TRIMETOPRIMA","SULFAMETOXAZOL+TRIMETO PRIMA","SULFATO DE ZINC","SULFATO DE ZINC MONOHIDRATO","TRIMETOPRIMA SULFAMETOXAZOL","TRIMETOPRIMA  SULFAMETO XAZOL","TRIMETOPRIMA- SULFAMETOXAZOL","TRIMETROPIM + SULFAMETOXAZOL","VIT B1; VIT B6; VIT B12","VIT. B1+B6+B12","VITAMINA A","VITAMINA B COMPLEJO","VITAMINA B1, VITAMINA B6, VITAMINA B12","VITAMINA B1,B6,B12","VITAMINA B1; B6; B12","VITAMINA B1; VITAMINA B6; VITAMINA B12","VITAMINA B1; VTAMINA B6; VITAMINA B12","VITAMINA B1-VITAMINA B2- VITAMINA B6","VITAMINA B1-VITAMINA B6- VITAMINA B12","VITAMINA D3 (COLECALCIFEROL)","VITAMINAS B1, B6, B12","VITAMINAS DEL 
            COMPLEJO B","ZINC","ZINC ELEMENTAL","BARBIJO DESECHABLE","BARBIJOS DESCARTABLES","GUANTES DE CIRUGIA ESTERILES DE LATEX DESECHABLES","GUANTES DE EXAMEN CON Y SIN POLVO DE LATEX Y NITRI","GUANTES DE EXAMINACION","GUANTES DE EXAMINACION CON POLVO DE LATEX  SIN POLV","GUANTES DE LATEX QUIRURGICOS-GUANTES DESCARTABLES","GUANTES NO ESTERILES","GUANTES PARA EXAMEN DESCARTABLES NO ESTÉRILES.","GUANTES QUIRURGICOS","GUANTES 
            QUIRURGICOS DESECHABLES","GUANTES QUIRURGICOS ESTERILES , DE EXAMEN NO ESTER","GUANTES QUIRURGICOS ESTERILES CON POLVO  SIN POLVO","GUANTES 
            QUIRURGICOS ESTERILES DE LATEX","GUANTES QUIRURGICOS, EXAMEN DE LATEX","VESTIMENTA QUIRURGICA","VESTIMENTA QUIRURGICA: (BATAS, GORRO, OTROS.)"];

        foreach ($data as $d) {
            DB::table('generics')->insert([
                'gname' => $d,
            ]);
        }
    }
}
