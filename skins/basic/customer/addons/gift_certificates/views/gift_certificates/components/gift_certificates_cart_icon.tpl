{assign var="icon_image_path" value="`$images_dir`/icons/gift_certificates_cart_icon.png"|unescape|fn_generate_thumbnail:$width:$height:false|escape}
<img src="{$icon_image_path}" {if $width}width="{$width}"{/if} {if $height}height="{$height}"{/if} border="0" alt="{$lang.gift_certificate}" title="{$lang.gift_certificate}" {if $class}class="{$class}"{/if}/>