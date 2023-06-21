<?php 

class ecolou {

    private $LinkGoogleFonts;
    

    public function __construct()
    {
        //initdata($this);
        $data = file_get_contents('./data/fonts.json');
        $this->LinkGoogleFonts = json_decode($data);
        
    }
    /**
     * Get the value of LinkGoogleFonts
     */ 
    public function getLinkGoogleFonts()
    {
        $html = "";
        $part1 = '<link href=\"';
        $part2 = '\" rel="stylesheet\" >';
        foreach (($this->LinkGoogleFonts) as $font){
            $html = $html . "\r" . $part1 . $font->url . $part2;            
        }
        return $html;
    }
}



?>