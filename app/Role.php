<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
<<<<<<< HEAD

=======
    public function user()
    {
      return $this->belongsTo('App\User');
    }
>>>>>>> 58a207c25d5383009e6bceb490b3094d2f987fdc
}
