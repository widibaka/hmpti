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

class Google_Service_SystemsManagement_RepositoryResource extends Google_Model
{
  protected $aptType = 'Google_Service_SystemsManagement_RepositoryResourceAptRepository';
  protected $aptDataType = '';
  protected $gooType = 'Google_Service_SystemsManagement_RepositoryResourceGooRepository';
  protected $gooDataType = '';
  protected $yumType = 'Google_Service_SystemsManagement_RepositoryResourceYumRepository';
  protected $yumDataType = '';
  protected $zypperType = 'Google_Service_SystemsManagement_RepositoryResourceZypperRepository';
  protected $zypperDataType = '';

  /**
   * @param Google_Service_SystemsManagement_RepositoryResourceAptRepository
   */
  public function setApt(Google_Service_SystemsManagement_RepositoryResourceAptRepository $apt)
  {
    $this->apt = $apt;
  }
  /**
   * @return Google_Service_SystemsManagement_RepositoryResourceAptRepository
   */
  public function getApt()
  {
    return $this->apt;
  }
  /**
   * @param Google_Service_SystemsManagement_RepositoryResourceGooRepository
   */
  public function setGoo(Google_Service_SystemsManagement_RepositoryResourceGooRepository $goo)
  {
    $this->goo = $goo;
  }
  /**
   * @return Google_Service_SystemsManagement_RepositoryResourceGooRepository
   */
  public function getGoo()
  {
    return $this->goo;
  }
  /**
   * @param Google_Service_SystemsManagement_RepositoryResourceYumRepository
   */
  public function setYum(Google_Service_SystemsManagement_RepositoryResourceYumRepository $yum)
  {
    $this->yum = $yum;
  }
  /**
   * @return Google_Service_SystemsManagement_RepositoryResourceYumRepository
   */
  public function getYum()
  {
    return $this->yum;
  }
  /**
   * @param Google_Service_SystemsManagement_RepositoryResourceZypperRepository
   */
  public function setZypper(Google_Service_SystemsManagement_RepositoryResourceZypperRepository $zypper)
  {
    $this->zypper = $zypper;
  }
  /**
   * @return Google_Service_SystemsManagement_RepositoryResourceZypperRepository
   */
  public function getZypper()
  {
    return $this->zypper;
  }
}
