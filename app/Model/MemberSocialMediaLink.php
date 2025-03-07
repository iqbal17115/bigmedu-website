<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MemberSocialMediaLink extends Model
{
    protected $fillable = ['member_id','facebook','linkedin','twitter','skype','whatsapp','instagram','pinterest','google_scholar','research_gate','publons','orcid'];
}
