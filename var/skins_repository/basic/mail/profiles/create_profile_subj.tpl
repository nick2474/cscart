{assign var='u_type' value=$user_data.user_type|fn_get_user_type_description|lower}
{if $user_data.company_name}{$user_data.company_name|unescape}{else}{$settings.Company.company_name|unescape}{/if}: {$lang.new_profile_notification|replace:'[user_type]':$u_type}