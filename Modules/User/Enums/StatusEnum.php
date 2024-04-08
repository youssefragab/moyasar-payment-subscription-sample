<?php 
namespace Modules\User\Enums;

enum StatusEnum: int {
    case ACTIVE   = 1;
    case INACTIVE = 0;
    case BLOCKED  = 2;
}