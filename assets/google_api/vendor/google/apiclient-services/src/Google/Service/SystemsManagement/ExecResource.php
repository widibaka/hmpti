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

class Google_Service_SystemsManagement_ExecResource extends Google_Model
{
  protected $enforceType = 'Google_Service_SystemsManagement_ExecResourceExec';
  protected $enforceDataType = '';
  protected $validateType = 'Google_Service_SystemsManagement_ExecResourceExec';
  protected $validateDataType = '';

  /**
   * @param Google_Service_SystemsManagement_ExecResourceExec
   */
  public function setEnforce(Google_Service_SystemsManagement_ExecResourceExec $enforce)
  {
    $this->enforce = $enforce;
  }
  /**
   * @return Google_Service_SystemsManagement_ExecResourceExec
   */
  public function getEnforce()
  {
    return $this->enforce;
  }
  /**
   * @param Google_Service_SystemsManagement_ExecResourceExec
   */
  public function setValidate(Google_Service_SystemsManagement_ExecResourceExec $validate)
  {
    $this->validate = $validate;
  }
  /**
   * @return Google_Service_SystemsManagement_ExecResourceExec
   */
  public function getValidate()
  {
    return $this->validate;
  }
}
