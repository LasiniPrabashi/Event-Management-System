<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public $preserveKeys = true;

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}



//Eloquent: API Resources

//In Laravel, Eloquent API Resources කියන්නේ Eloquent models JSON format එකට transform කරන්න use කරන එකක්,
// API responses structure කරා ගැනීමට. මේක responses clean, consistent, සහ secure කරන්න ensure කරනවා,
// එම නිසා API management එකට ප්‍රයෝජනවත් වේ.

//Data Transformation සහ Control: API resources use කරල, JSON response එකට දාන්න ඕන attributes, relationships හරි හරි විදිහට control කරන්න පුළුවන්.
// ඉතින් sensitive data exclude කරන්න හෝ required data පමණක් response එකට දාන්න ලේසි.
//Standardized Responses: Responses එකේ consistent format එකක් ලගා කරගන්න API resources support කරන නිසා clients API responses consume කරන්න ලේසියි.
//Improved Readability: Resource classes වල තියෙන transformation logic නිසා code එක readable. Controllers වලදි transformation logic embed කරන්නේ නැතුව Resource class එකේ encapsulate කරන නිසා, code maintain කරන්නත් ලේසි.
//Efficient Data Handling: Single models සහ collections දෙකටම data manage කරන්න easy. Response structure එක maintain කරගෙන, collections handle කරන්න API resources ගොඩක් efficient.
//Flexible Data Structure: Clients එක්ක සම්බන්ධතාව අරමුණට තියෙන විදිහට data format කරන්න API resources allow කරනවා. මේ විදිහට nested JSON structures හෝ flattened data handle කරන්න easier.
//Conditional Attributes: User roles, permissions වගේ conditions වලට base වෙලා attributes include/exclude කරන්න API resources ඉන්න flexibility එක use කරන්න පුළුවන්.
//Eager Loading Optimization: Eager loading control කරන්න resource classes enable කරන නිසා, nested relationships තිබ්බත් optimized query handling එකක් කරලා efficiency වැඩි කරන්න support කරනවා.

//Laravel එකේ API Resource එකක් create කරන්න නම්:

//php artisan make:resource UserResource


//Summary of Differences
//Single vs. Multiple:

//new UserResource(...) is for a single user.
//UserResource::collection(...) is for a collection of users.
//Error Handling:

//findOrFail() will throw an error if the user does not exist, leading to a 404 response.
//User::all() will return an empty collection if there are no users, which will simply return an empty array in the JSON response.
//Output Structure:

//The first returns a single JSON object representing a user.
//The second returns a JSON array containing multiple user objects.


//public $preserveKeys = true;
//{
//    "data": {
//    "22": {
//        "id": 22,
//            "name": "lasini0327",
//            "email": "lasiniprabashi0327@gmail.com",
//            "password": "$2y$12$09jnKfvdghBfU.KUG732OetsbAWq26ciYOch8TxkZ55ck7WFp7qwm",
//            "created_at": "2024-10-22T03:12:57.000000Z",
//            "updated_at": "2024-10-22T03:12:57.000000Z"
//        }
//}
//}
