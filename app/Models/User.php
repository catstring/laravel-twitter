<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'bio',
        'image',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        //'password' => 'hashed',
    ];

    public function ideas()
    {
        return $this->hasMany(Idea::class)->latest();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->latest();
    }

    public function followings(){
        return $this->belongsToMany(User::class,'follower_user','follower_id','user_id')->withTimestamps();
    }

    public function followers(){
        return $this->belongsToMany(User::class,'follower_user','user_id','follower_id')->withTimestamps();
    }

    public function follows(User $user){
        return $this->followings()->where('user_id',$user->id)->exists();
    }

    public function likes(){
        return $this->belongsToMany(Idea::class,'idea_like')->withTimestamps();
    }

    public function likesIdea(Idea $idea){
        return $this->likes()->where('idea_id',$idea->id)->exists();
    }

    public function getImageURL()
    {
        if ($this->image) {
            return url('storage/' . $this->image);
        }
        // return "https://api.dicebear.com/6.x/fun-emoji/svg?seed={$this->name}";
        // return "https://github.com/identicons/{$this->name}.png";
        // return "https://robohash.org/{$this->name}.png";

        // Define arrays for male and female features
        $maleTopTypes = ["ShortHairShortCurly", "ShortHairShortFlat", "ShortHairShortRound"];
        $femaleTopTypes = ["LongHairStraight", "LongHairCurly", "LongHairStraight2"];
        $accessoriesTypes = ["Blank", "Kurt", "Prescription01", "Prescription02", "Round"];
        $hairColors = ["Auburn", "Black", "Blonde", "BlondeGolden", "Brown"];
        $facialHairTypes = ["Blank", "BeardMedium", "BeardLight", "MoustacheFancy"];
        $facialHairColors = ["Auburn", "Black", "Blonde", "BlondeGolden", "Brown"];
        $clotheTypes = ["BlazerShirt", "BlazerSweater", "CollarSweater", "GraphicShirt"];
        $eyeTypes = ["Close", "Cry", "Default", "Dizzy", "EyeRoll"];
        $eyebrowTypes = ["Angry", "Default", "FlatNatural", "RaisedExcited", "SadConcerned"];
        $mouthTypes = ["Concerned", "Default", "Disbelief", "Eating", "Grimace"];
        $skinColors = ["Tanned", "Yellow", "Pale", "Light", "Brown"];

        $seed = $this->name;
        $hash = md5($seed);

        // Determine gender based on the hash
        $isMale = hexdec(substr($hash, 0, 1)) % 2 === 0;
        $topTypes = $isMale ? $maleTopTypes : $femaleTopTypes;

        $avatarUrl = "https://avataaars.io/?avatarStyle=Circle"
            . "&topType=" . $this->getRandomElement($hash, $topTypes, 1)
            . "&accessoriesType=" . $this->getRandomElement($hash, $accessoriesTypes, 2)
            . "&hairColor=" . $this->getRandomElement($hash, $hairColors, 3)
            . "&clotheType=" . $this->getRandomElement($hash, $clotheTypes, 4)
            . "&eyeType=" . $this->getRandomElement($hash, $eyeTypes, 5)
            . "&eyebrowType=" . $this->getRandomElement($hash, $eyebrowTypes, 6)
            . "&mouthType=" . $this->getRandomElement($hash, $mouthTypes, 7)
            . "&skinColor=" . $this->getRandomElement($hash, $skinColors, 8)
            . "&seed=" . urlencode($seed);

        // Add facial hair parameters for male users only
        if ($isMale) {
            $avatarUrl .= "&facialHairType=" . $this->getRandomElement($hash, $facialHairTypes, 9)
                . "&facialHairColor=" . $this->getRandomElement($hash, $facialHairColors, 10);
        }

        // Debugging output to verify gender-based logic
        error_log("Generated avatar URL for user {$this->name} as " . ($isMale ? "male" : "female") . ": $avatarUrl");

        return $avatarUrl;
        }

        private function getRandomElement($hash, $arr, $position)
        {
        $index = hexdec(substr($hash, $position, 1)) % count($arr);
        return $arr[$index];
        }
}
