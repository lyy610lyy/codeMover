<?php
/**
 * Created by LYY
 * Date: 2018/1/18
 * Time: 13:54
 */
class CD{
    public $trackList;

    public function __construct(){
        $this->trackList = array();
    }

    public function addTrack($track){
        $this->trackList[] = $track;
    }

    /**
     * @return string
     */
    public function getTrackList()
    {
        $output = '';
        foreach ($this->trackList as $num => $track){
            $output .= ($num + 1) . "  {$track} . ";
        }
        return $output;
    }
}

$tracksFrom = array('What It Means', 'Brr', 'Goodbye');
$myCD = new CD();

foreach ($tracksFrom as $track){
    $myCD->addTrack($track);
}
print $myCD->getTrackList();