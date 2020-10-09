<?php
/**
 * Created by PhpStorm.
 * User: Pedro Artico Rodrigues
 * Date: 03/08/2018
 * Time: 18:55
 */

/**
 * Class SpecialWords is responsible for handling words in content that can be called keywords. The class also applies the concepts of extractive summarization and stemming to some of its methods.
 */
class SpecialWords
{
    /**
     * Method that contains an array with all words considered stopwords, according to Porter and VIviane Orengo.
     * @return array
     */
    public function stopwordsVector()
    {
        $stopWords ='1,2,3,4,5,6,7,8,9,0,"@type","@id","url","imageobject",comment_face,comment_fac,Twitter,FacebookShare,TwitterShare,GooleShare,Share,share,opacity,#content_post,newsletter,tenho,tem,temos,tém,tinha,tínhamos,tinham,tive,teve,tivemos,tiveram,tivera,tivéramos,tenha,tenhamos,tenham,tivesse,tivéssemos,tivessem,tiver,tivermos,tiverem,terei,terá,teremos,terão,teria,teríamos,teriam,sou,somos,são,era,éramos,eram,fui,foi,fomos,foram,fora,fôramos,sejamos,sejam,fosse,fôssemos,fossem,for,formos,forem,serei,será,seremos,serão,seria,seríamos,seriam,hei,há,havemos,hão,houve,houvemos,houveram,houvera,houvéramos,haja,hajamos,hajam,houvesse,houvéssemos,houvessem,houver,houvermos,houverem,houverei,houverá,houveremos,houverão,houveria,houveríamos,houveriam,tu,te,vocês,vos,lhes,meus,minhas,teu,tua,teus,tuas,nosso,nossa,nossos,nossas,dela,delas,esta,estes,estas,aquele,aquela,aqueles,aquelas,isto,aquilo,estou,está,estamos,estão,estive,esteve,estivemos,estiveram,estava,estávamos,estavam,estivera,estivéramos,esteja,estejamos,estejam,estivesse,estivéssemos,estivessem,estiver,estivermos,estiverem,de,a,o,que,e,do,da,em,um,para,é,com,não,uma,os,no,se,na,por,mais,as,dos,como,mas,ao,ele,das,tem,à,seu,sua,ou,ser,quando,muito,há,nos,já,está,eu,também,pelo,pela,até,isso,ela,entre,era,depois,sem,mesmo,aos,ter,seus,quem,nas,me,esse,eles,estão,você,tinha,foram,essa,num,nem,suas,meu,às,minha,têm,numa,pelos,elas,havia,seja,qual,será,nós,tenho,lhe,deles,essas,esses,pelas,este,fosse,dele,Tenho,Tem,Temos,Tém,Tinha,Tínhamos,Tinham,Tive,Teve,Tivemos,Tiveram,Tivera,Tivéramos,Tenha,Tenhamos,Tenham,Tivesse,Tivéssemos,Tivessem,Tiver,Tivermos,Tiverem,Terei,Terá,Teremos,Terão,Teria,Teríamos,Teriam,Sou,Somos,Era,Éramos,Eram,Fui,Foi,Fomos,Foram,Fora,Fôramos,Sejamos,Sejam,Fosse,Fôssemos,Fossem,For,Formos,Forem,Serei,Será,Seremos,Serão,Seria,Seríamos,Seriam,Hei,Há,Havemos,Hão,Houve,Houvemos,Houveram,Houvera,Houvéramos,Haja,Hajamos,Hajam,Houvesse,Houvéssemos,Houvessem,Houver,Houvermos,Houverem,Houverei,Houverá,Houveremos,Houverão,Houveria,Houveríamos,Houveriam,Tu,Te,Vocês,Vos,Lhes,Meus,Minhas,Teu,Tua,Teus,Tuas,Nosso,Nossa,Nossos,Nossas,Dela,Delas,Esta,Estes,Estas,Aquele,Aquela,Aqueles,Aquelas,Isto,Aquilo,Estou,Está,Estamos,Estão,Estive,Esteve,Estivemos,Estiveram,Estava,Estávamos,Estavam,Estivera,Estivéramos,Esteja,Estejamos,Estejam,Estivesse,Estivéssemos,Estivessem,Estiver,Estivermos,Estiverem,De,A,O,Que,E,Do,Da,Em,Um,Para,É,Com,Não,Uma,Os,No,Se,Na,Por,Mais,As,Dos,Como,Mas,Ao,Ele,Das,Tem,À,Seu,Sua,Ou,Ser,Quando,Muito,Há,Nos,Já,Está,Eu,Também,Pelo,Pela,Até,Isso,Ela,Entre,Era,Depois,Sem,Mesmo,Aos,Ter,Seus,Quem,Nas,Me,Esse,Eles,Estão,Você,Tinha,Foram,Essa,Num,Nem,Suas,Meu,Às,Minha,Têm,Numa,Pelos,Elas,Havia,Seja,Qual,Será,Nós,Tenho,Lhe,Deles,Essas,Esses,Pelas,Este,Fosse,Dele,diz,dizem,então,ver,sido,mesma,mesmas,mesmos,outra,outras,sobre,após,todo,todos,porque,sobre,tudo,fazer,contra,nunca,quanto,quantos,algum,alguma,algumas,dessas,dessa,pode,pôde,podendo,poder,poderia,poderiam,outro,outros,agora,Diz,Dizem,Então,Ver,Sido,Mesma,Mesmas,Mesmos,Outra,Outras,Sobre,Após,Todo,Todos,Porque,Sobre,Tudo,Fazer,Contra,Nunca,Quanto,Quantos,Algum,Alguma,Algumas,Dessas,Dessa,Pode,Pôde,Podendo,Poder,Poderia,Poderiam,Outro,Outros,Agora,talvez,Talvez,cada,deve,devem,devendo,dever,deverá,deverão,deveria,deveriam,devia,deviam,ainda,todas,feita,feitas,feito,feitos,Cada,Deve,Devem,Devendo,Dever,Deverá,Deverão,Deveria,Deveriam,Devia,Deviam,Ainda,Todas,Feita,Feitas,Feito,Feitos,Só,só,antes,Antes,sempre,Sempre,tampouco,Tampouco,Sendo,sendo,alguns,Alguns,disso,Disso,disto,Disto,Dito,dito,nenhum,Nenhum,desses,Desses,desse,Desse';
        return explode(",", $stopWords);
    }

    /**
     * This method is responsible for removing all punctuation characters from a string.
     * @param String $string
     * @return String
     */
    public function removePunctuationCharacters($string)
    {
        $ignore = ['-', ".", ",", "!", ";", ":", "(", ")", "{", "}", "[", "]", "<", ">", "?", "|", "\\", "/", "+", "/", "*", "=", "'", "'"];
        return str_replace($ignore, "", $string);
    }

    /**
     * This method is responsible for tokenizing the content obtained in the WEB search. Content is delimited by " " and an array of words is returned.
     * @return array
     */
    public function contentTokenization()
    {
		if(file_exists('clean content.txt'))
		{
			$content = file_get_contents('clean content.txt');
			return explode(" ", $this->removePunctuationCharacters($content));
		}	
    }

    /**
     * This method is responsible for removing all accented characters by matching characters.
     * @param String $string
     * @return String
     */
    public function removeAccents($string){
        return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/","/(ç)/","/(Ç)/"),explode(" ","a A e E i I o O u U n N c C"),$string);
    }

    /**
     * This method gets the tokenized content (contentTokenization()) and compares it to the stropwords vector (stopWordsVector()). In this way, all stop words are removed from the content.
     * @return array
     */
    public function removeStopwords()
    {
		if(!empty($this->contentTokenization()))
		{	
			$query = array();
			foreach($this->contentTokenization() as $value)
			{
				if((!in_array($value, $this->stopwordsVector())) && (!empty($value)))
				{
					$query[] = $value;
				}
			}
			return $query;
		}	
    }

    /**
     * This method is responsible for calling a python script that stemming words according to the Porter algorithm.
     */
    public function stemmingKeywords()
    {
        $my_command = escapeshellcmd('python C: Stemmer.py');
        shell_exec($my_command);
    }

    /**
     * This method is responsible for applying the method of extracting keywords from the content of a Web search.
     */
    function extractKeywords()
    {
		if(!empty($this->removeStopwords()))
		{
			$keywords=array();
			$extractor= array_count_values($this->removeStopwords());
			arsort($extractor);
			$array=array_keys($extractor);
			for($i=0;$i<3;$i++)
			{
				if(!empty($array[$i]))
				{	
					$keywords[$i]=$array[$i];
				}
			}
			file_put_contents('keys.txt',utf8_decode(implode(" ",$keywords)));
		}
	}	
}