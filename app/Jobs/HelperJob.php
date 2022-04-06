<?php

namespace Acelle\Jobs;
use Acelle\Model\Category;

class HelperJob extends Base
{
    
    public function categories(){
        return Category::get();
    }
}
