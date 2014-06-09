<?php
    class RssReader{
        private $_url = null;

        public function setUrl($url){
          $this->_url = $url;
        }

        public function getUrl(){
          return $_url;
        }

        public function getBootstrap($width = 3, $col = 4){
          if($this->_url === null)
            return false;
          $rss = simplexml_load_file($this->_url);
          $count = 0;
          $items = $rss->channel[0]->item;
          $flag = false;
          foreach($items as $item) {
            if($cout%$col==0){
              echo("<div class='row'>");
                  $flag = true;
            }
            $desc = $this->changeDescription($item->description);
            echo("<div class='col-md-".$width."'>"."<h3><a href ='".$item->link."'>".$item->title."</a></h3>".$desc."</div>");
            $cout++;
            if($cout%$col==0){
              echo("</div>");
              $flag = false;
            }
          }
          if($flag)
            echo("</div>");
        }



        private function syncDescription($description){
          $count = 0;
          $all = explode("<br />",$description);
          $seller = substr($all[$count],14);
          if(count($all)>8)
            $count++;
          $price = explode(": ",$all[++$count]);
          $endDate = substr($all[++$count],12);
          if(count($all)>8)
            $count++;
          $buyLink = explode(">", $all[++$count])[0].">";
          $count++;
          $img = $all[++$count];
          $return = array("seller"=>$seller,"price"=>$price,"endDate"=>$endDate,"buyLink"=>$buyLink,"img"=>$img);
          return $return;
        }

        private function changeDescription($description){
          $all = $this->syncDescription($description);
          $a = null;
          if(strcmp(trim($all["price"][0]),trim("Aktualna cena"))==0)
            $a = "Licytuj";
          else
            $a = "Kup teraz";

          $return = $all["img"]."</br><p><b>Sprzedający: </b>".$all["seller"]."</p><p><b>".$all["price"][0].": </b>".$all["price"][1]."</p><p><b>Do końca: </b>".$all["endDate"]."</p><div>".$all["buyLink"]."<div class='allegro-link'>".$a."</div></a></div>";
          return $return;
        }

        public function getHTML(){
          if($this->_url === null)
            return false;
          $rss = simplexml_load_file($this->_url);
          $items = $rss->channel[0]->item;
          foreach($items as $item) {
            $desc = $this->changeDescription($item->description);
            echo("<div><h3><a href ='".$item->link."'>".$item->title."</a></h3>".$desc."</div>");
          }
        }


    }
?>
