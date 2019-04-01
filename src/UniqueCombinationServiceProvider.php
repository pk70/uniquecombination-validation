<?php 
namespace Discover\UniqueCombination;

use Illuminate\Support\ServiceProvider;
use DB;
use Validator;

class UniqueCombinationServiceProvider extends ServiceProvider
{
  public function boot(){

     Validator::extend('unique_combination', function($attribute, $value, $parameters) {
            $table_name = $parameters[0];
            $field_name = $parameters[1];
            $separator = $parameters[2];

            $user_array=explode($separator,$value);
            asort($user_array);
            $do=1;
            $result=DB::select('select '.$field_name.' as name_field from '.$table_name.'');
              
            foreach ($result as $key => $value) {
              $expl[]=explode($separator, $value->name_field);
              asort($expl[$key]);
              $tu[]=array_diff($expl[$key], $user_array);
            }
             
            if(!empty($tu[$key])){
              $do=0;
              return $do==0;
            }
         });
  }

  public function register(){

  }
}
?>