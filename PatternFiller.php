<?php
    namespace LinusCodes\patternfiller;
    
    class PatternFiller{

        //replace placeholders that fit a regex with data of an json-string
        public function replacePlaceholder($origin, $data, $pattern){
            $placeholders = $this->getMatches($origin, $pattern);

            foreach ($placeholders[1] as $placeholder) {

                if (isset($data[$placeholder])) {

                    if (is_array($data[$placeholder])) {

                        $arrayContent = '';

                        foreach ($data[$placeholder] as $content) {
                            if(isset($content['pattern'])) $subpattern = $content['pattern'];
                            else $subpattern = $pattern;
                            $arrayContent .= $this->replacePlaceholder($content['format'], $content, $subpattern);
                        }

                        $origin = str_replace('[($'.$placeholder.')]', $arrayContent, $origin);

                    } else {
                        $origin = str_replace('[($'.$placeholder.')]', $data[$placeholder], $origin);
                    }
                }
            }
            return $origin;
        }

        //gets 
        private function getMatches($string, $pattern){
            preg_match_all($pattern, $string, $placeholders);
            return $placeholders;
        }
    }