<?php
/**
 * Copyright 2011 Victor Farazdagi
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); 
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at 
 *
 *          http://www.apache.org/licenses/LICENSE-2.0 
 *
 * Unless required by applicable law or agreed to in writing, software 
 * distributed under the License is distributed on an "AS IS" BASIS, 
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. 
 * See the License for the specific language governing permissions and 
 * limitations under the License. 
 *
 * @category    Phrozn
 * @package     Phrozn\Site\View
 * @author      Victor Farazdagi
 * @copyright   2011 Victor Farazdagi
 * @license     http://www.apache.org/licenses/LICENSE-2.0
 */

namespace Phrozn\Site\View\OutputPath;
use Phrozn\Site\View;

/**
 * Output path builder for site scripts
 *
 * @category    Phrozn
 * @package     Phrozn\Site\View
 * @author      Victor Farazdagi
 */
class Script 
    extends Base
{
    /**
     * Get calculated path
     *
     * @return string
     */
    public function get()
    {
        // get rid of extension
        $inputFile = $this->getView()->getInputFile();
        $pos = strrpos($inputFile, '.');
        if (false !== $pos) {
            $inputFile = substr($inputFile, 0, $pos); 
        }

        // find relative path, wrt to scripts
        $pos = strpos($inputFile, '/scripts');
        if ($pos !== false) {
            $inputFile = substr($inputFile, $pos);
        } else {
            $inputFile = '/scripts/' . basename($inputFile);
        }
        return $this->getView()->getOutputDir() . $inputFile . '.js';
    }
}