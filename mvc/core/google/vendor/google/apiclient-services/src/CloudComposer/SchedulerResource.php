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

namespace Google\Service\CloudComposer;

class SchedulerResource extends \Google\Model
{
  public $count;
  public $cpu;
  public $memoryGb;
  public $storageGb;

  public function setCount($count)
  {
    $this->count = $count;
  }
  public function getCount()
  {
    return $this->count;
  }
  public function setCpu($cpu)
  {
    $this->cpu = $cpu;
  }
  public function getCpu()
  {
    return $this->cpu;
  }
  public function setMemoryGb($memoryGb)
  {
    $this->memoryGb = $memoryGb;
  }
  public function getMemoryGb()
  {
    return $this->memoryGb;
  }
  public function setStorageGb($storageGb)
  {
    $this->storageGb = $storageGb;
  }
  public function getStorageGb()
  {
    return $this->storageGb;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SchedulerResource::class, 'Google_Service_CloudComposer_SchedulerResource');
