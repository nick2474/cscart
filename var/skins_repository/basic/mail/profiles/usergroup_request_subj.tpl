{if $user_data.company_name}{$user_data.company_name|unescape}{else}{$settings.Company.company_name|unescape}{/if}: {$lang.usergroup_request_by_customer} "{if $settings.General.use_email_as_login != "Y"}{$user_data.user_login}{else}{$user_data.email}{/if}"