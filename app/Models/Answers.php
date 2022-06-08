<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use function PHPUnit\Framework\returnArgument;

class Answers extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'content',
        'user_id',
        'questions_id',
    ];

    public function timeAgo(\DateTime $dateTime)
    {
        $time_difference = time() - $dateTime->getTimestamp();

        if( $time_difference < 1 ) { return '1 second ago'; }
        $condition = array( 12 * 30 * 24 * 60 * 60 =>  'year',
            30 * 24 * 60 * 60       =>  'month',
            24 * 60 * 60            =>  'day',
            60 * 60                 =>  'hour',
            60                      =>  'minute',
            1                       =>  'second'
        );

        foreach( $condition as $secs => $str )
        {
            $d = $time_difference / $secs;

            if( $d >= 1 )
            {
                $t = round( $d );
                return $t . ' ' . $str . ( $t > 1 ? 's' : '' ) . ' ago';
            }
        }
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function questions():BelongsTo
    {
        return $this->belongsTo(Questions::class);
    }
}
