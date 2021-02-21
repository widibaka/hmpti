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

class Google_Service_SystemsManagement_OsconfigFile extends Google_Model
{
  public $allowInsecure;
  protected $gcsType = 'Google_Service_SystemsManagement_FileGcs';
  protected $gcsDataType = '';
  public $localPath;
  protected $remoteType = 'Google_Service_SystemsManagement_FileRemote';
  protected $remoteDataType = '';

  public function setAllowInsecure($allowInsecure)
  {
    $this->allowInsecure = $allowInsecure;
  }
  public function getAllowInsecure()
  {
    return $this->allowInsecure;
  }
  /**
   * @param Google_Service_SystemsManagement_FileGcs
   */
  public function setGcs(Google_Service_SystemsManagement_FileGcs $gcs)
  {
    $this->gcs = $gcs;
  }
  /**
   * @return Google_Service_SystemsManagement_FileGcs
   */
  public function getGcs()
  {
    return $this->gcs;
  }
  public function setLocalPath($localPath)
  {
    $this->localPath = $localPath;
  }
  public function getLocalPath()
  {
    return $this->localPath;
  }
  /**
   * @param Google_Service_SystemsManagement_FileRemote
   */
  public function setRemote(Google_Service_SystemsManagement_FileRemote $remote)
  {
    $this->remote = $remote;
  }
  /**
   * @return Google_Service_SystemsManagement_FileRemote
   */
  public function getRemote()
  {
    return $this->remote;
  }
}
