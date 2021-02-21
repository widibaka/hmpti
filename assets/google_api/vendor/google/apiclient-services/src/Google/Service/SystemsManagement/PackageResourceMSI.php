<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

class Google_Service_SystemsManagement_PackageResourceMSI extends Google_Collection
{
  protected $collection_key = 'flags';
  public $allowedSuccessCodes;
  public $flags;
  protected $sourceType = 'Google_Service_SystemsManagement_OsconfigFile';
  protected $sourceDataType = '';

  public function setAllowedSuccessCodes($allowedSuccessCodes)
  {
    $this->allowedSuccessCodes = $allowedSuccessCodes;
  }
  public function getAllowedSuccessCodes()
  {
    return $this->allowedSuccessCodes;
  }
  public function setFlags($flags)
  {
    $this->flags = $flags;
  }
  public function getFlags()
  {
    return $this->flags;
  }
  /**
   * @param Google_Service_SystemsManagement_OsconfigFile
   */
  public function setSource(Google_Service_SystemsManagement_OsconfigFile $source)
  {
    $this->source = $source;
  }
  /**
   * @return Google_Service_SystemsManagement_OsconfigFile
   */
  public function getSource()
  {
    return $this->source;
  }
}
