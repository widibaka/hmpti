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

class Google_Service_SystemsManagement_ExecResourceExec extends Google_Collection
{
  protected $collection_key = 'args';
  public $allowedSuccessCodes;
  public $args;
  protected $fileType = 'Google_Service_SystemsManagement_OsconfigFile';
  protected $fileDataType = '';
  public $interpreter;
  public $script;

  public function setAllowedSuccessCodes($allowedSuccessCodes)
  {
    $this->allowedSuccessCodes = $allowedSuccessCodes;
  }
  public function getAllowedSuccessCodes()
  {
    return $this->allowedSuccessCodes;
  }
  public function setArgs($args)
  {
    $this->args = $args;
  }
  public function getArgs()
  {
    return $this->args;
  }
  /**
   * @param Google_Service_SystemsManagement_OsconfigFile
   */
  public function setFile(Google_Service_SystemsManagement_OsconfigFile $file)
  {
    $this->file = $file;
  }
  /**
   * @return Google_Service_SystemsManagement_OsconfigFile
   */
  public function getFile()
  {
    return $this->file;
  }
  public function setInterpreter($interpreter)
  {
    $this->interpreter = $interpreter;
  }
  public function getInterpreter()
  {
    return $this->interpreter;
  }
  public function setScript($script)
  {
    $this->script = $script;
  }
  public function getScript()
  {
    return $this->script;
  }
}
