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

class Google_Service_SystemsManagement_PackageResource extends Google_Model
{
  protected $aptType = 'Google_Service_SystemsManagement_PackageResourceAPT';
  protected $aptDataType = '';
  protected $debType = 'Google_Service_SystemsManagement_PackageResourceDeb';
  protected $debDataType = '';
  public $desiredState;
  protected $googetType = 'Google_Service_SystemsManagement_PackageResourceGooGet';
  protected $googetDataType = '';
  protected $msiType = 'Google_Service_SystemsManagement_PackageResourceMSI';
  protected $msiDataType = '';
  protected $rpmType = 'Google_Service_SystemsManagement_PackageResourceRPM';
  protected $rpmDataType = '';
  protected $yumType = 'Google_Service_SystemsManagement_PackageResourceYUM';
  protected $yumDataType = '';
  protected $zypperType = 'Google_Service_SystemsManagement_PackageResourceZypper';
  protected $zypperDataType = '';

  /**
   * @param Google_Service_SystemsManagement_PackageResourceAPT
   */
  public function setApt(Google_Service_SystemsManagement_PackageResourceAPT $apt)
  {
    $this->apt = $apt;
  }
  /**
   * @return Google_Service_SystemsManagement_PackageResourceAPT
   */
  public function getApt()
  {
    return $this->apt;
  }
  /**
   * @param Google_Service_SystemsManagement_PackageResourceDeb
   */
  public function setDeb(Google_Service_SystemsManagement_PackageResourceDeb $deb)
  {
    $this->deb = $deb;
  }
  /**
   * @return Google_Service_SystemsManagement_PackageResourceDeb
   */
  public function getDeb()
  {
    return $this->deb;
  }
  public function setDesiredState($desiredState)
  {
    $this->desiredState = $desiredState;
  }
  public function getDesiredState()
  {
    return $this->desiredState;
  }
  /**
   * @param Google_Service_SystemsManagement_PackageResourceGooGet
   */
  public function setGooget(Google_Service_SystemsManagement_PackageResourceGooGet $googet)
  {
    $this->googet = $googet;
  }
  /**
   * @return Google_Service_SystemsManagement_PackageResourceGooGet
   */
  public function getGooget()
  {
    return $this->googet;
  }
  /**
   * @param Google_Service_SystemsManagement_PackageResourceMSI
   */
  public function setMsi(Google_Service_SystemsManagement_PackageResourceMSI $msi)
  {
    $this->msi = $msi;
  }
  /**
   * @return Google_Service_SystemsManagement_PackageResourceMSI
   */
  public function getMsi()
  {
    return $this->msi;
  }
  /**
   * @param Google_Service_SystemsManagement_PackageResourceRPM
   */
  public function setRpm(Google_Service_SystemsManagement_PackageResourceRPM $rpm)
  {
    $this->rpm = $rpm;
  }
  /**
   * @return Google_Service_SystemsManagement_PackageResourceRPM
   */
  public function getRpm()
  {
    return $this->rpm;
  }
  /**
   * @param Google_Service_SystemsManagement_PackageResourceYUM
   */
  public function setYum(Google_Service_SystemsManagement_PackageResourceYUM $yum)
  {
    $this->yum = $yum;
  }
  /**
   * @return Google_Service_SystemsManagement_PackageResourceYUM
   */
  public function getYum()
  {
    return $this->yum;
  }
  /**
   * @param Google_Service_SystemsManagement_PackageResourceZypper
   */
  public function setZypper(Google_Service_SystemsManagement_PackageResourceZypper $zypper)
  {
    $this->zypper = $zypper;
  }
  /**
   * @return Google_Service_SystemsManagement_PackageResourceZypper
   */
  public function getZypper()
  {
    return $this->zypper;
  }
}
