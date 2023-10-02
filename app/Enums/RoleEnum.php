<?php

namespace App\Enums;

enum RoleEnum: string
{
    case SUPERADMIN = 'superadmin';
    case ADMIN = 'admin';
    case BURSAR = 'bursar';
    case TEACHER = 'teacher';
    case STUDENT = 'student';
}
