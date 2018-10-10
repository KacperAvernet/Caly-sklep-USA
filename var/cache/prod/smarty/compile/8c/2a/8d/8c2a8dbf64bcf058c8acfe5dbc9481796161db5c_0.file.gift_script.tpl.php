<?php
/* Smarty version 3.1.32, created on 2018-10-10 03:33:41
  from '/home/www/clients/client1/web339/web/modules/giftcard/views/templates/admin/_add/helpers/form/gift_script.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5bbdab5580c265_50218440',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8c2a8dbf64bcf058c8acfe5dbc9481796161db5c' => 
    array (
      0 => '/home/www/clients/client1/web339/web/modules/giftcard/views/templates/admin/_add/helpers/form/gift_script.tpl',
      1 => 1539095384,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bbdab5580c265_50218440 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
>
var selected_shops = "<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['selected_shops']->value,'htmlall','UTF-8' ));?>
";
var token = "<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['token']->value,'htmlall','UTF-8' ));?>
";
var file_not_found = '';
$(document).ready(function ()
{
	//** Search a product
	$('.displayed_flag .pointer').addClass('btn btn-default');
	$('.language_flags').addClass('well').css('display','inline-block').hide();
	var link = jQuery('#spy').val();
	var lang = jQuery('#lang_spy').val();
	$("#reductionProductFilter")
		.autocomplete(
			'ajax-tab.php', {
				minChars: 3,
				max: 10,
				width: 500,
				selectFirst: false,
				scroll: false,
				dataType: 'json',
				formatItem: function(data, i, max, value, term) {
					return value;
				},
				parse: function(data) {
					var mytab = new Array();
					for (var i = 0; i < data.length; i++)
						mytab[mytab.length] = { data: data[i], value: data[i].id_product + ' - ' + data[i].name };
					return mytab;
				},
				extraParams: {
					ajaxSearch: 1,
					id_lang: lang,
					controller: 'AdminCreateGift',
					token: token,
					reductionProductFilter: 1
				}
			}
		)
		.result(function(event, data, formatted)
		{
			if ( data.id_product.length > 0 && data.name.length > 0 )
			{
 				$("#reductionProductFilter").val(data.name);
 				$("#selected_prod").val(data.id_product);
 				$("#reduction_product").val(data.id_product);
 				$("#reduction_product").trigger('change');
 			}
		})
	if ($("input:radio[name=value_type]").is(":checked"))
	{
		var radio = $("input[type='radio'][name='value_type']:checked").val();
		switch(radio)
		{
			case 'dropdown' :
				$("#percent_range").hide();
				$("#percent_fixed").hide();
				$("#percent_dropdown").show();
				break;

			case 'fixed' :
				$("#percent_dropdown").hide();
				$("#percent_range").hide();
				$("#percent_fixed").show();
					break;

			case 'range' :
				$("#percent_dropdown").hide();
				$("#percent_fixed").hide();
				$("#percent_range").show();
					break;
		}
	}

	//** Show/Hide value type options 
	$('#dropdown').click(function () {
		$("#dropdown_div").show();
		$("#card_val").show();
		$("#range_div").hide();
		$("#fixed_div").hide();
		// hiding percentage fields
		$("#percent_range").hide();
		$("#percent_fixed").hide();
		$("#percent_dropdown").show();
	});

	$('#fixed').click(function () {
		$("#fixed_div").show();
		$("#card_val").show();
		$("#range_div").hide();
		$("#dropdown_div").hide();
		// hiding percentage fields
		$("#percent_dropdown").hide();
		$("#percent_range").hide();
		$("#percent_fixed").show();
	});

	$('#range').click(function () {
		$("#dropdown_div").hide();
		$("#range_div").show();
		$("#card_val").hide();
		$("#fixed_div").hide();
	// hiding percentage fields
		$("#percent_dropdown").hide();
		$("#percent_fixed").hide();
		$("#percent_range").show();

	});

		 //** Show/Hide Discount options
	$('#apply_discount_percent').click(function () {
		$("#apply_discount_percent_div").show();
 		$("#apply_discount_amount_div").hide();
		$("#apply_discount_to_div").show();
	});
	$('#apply_discount_amount').click(function () {
		$("#apply_discount_amount_div").show();
		$("#apply_discount_percent_div").hide();
		$("#apply_discount_to_div").show();
	});
	$('#apply_discount_off').click(function () {
		$("#apply_discount_percent_div").hide();
		$("#apply_discount_amount_div").hide();
		$("#apply_discount_to_div").hide();
	});

	//** Hide/Show selection product
	$('#apply_discount_to_product').click(function () {
		$("#apply_discount_to_product_div").show();
	});
	$('#apply_discount_to_order').click(function () {
		$("#apply_discount_to_product_div").hide();
	});

	$('#gift-image').on('change', function(){
		readURL(this);
	})
	
 	hideOtherLanguage(<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['id_lang']->value,'htmlall','UTF-8' ));?>
);
    tinyMCE.init({
                    mode : "textareas",
                    theme : "advanced",
                    plugins : "safari,pagebreak,style,layer,table,advimage,advlink,inlinepopups,media,searchreplace,contextmenu,paste,directionality,fullscreen",
                    theme_advanced_buttons1 : "newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
                    theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,,|,forecolor,backcolor",
                    theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,media,|,ltr,rtl,|,fullscreen",
                    theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,pagebreak",
                    theme_advanced_toolbar_location : "top",
                    theme_advanced_toolbar_align : "left",
                    theme_advanced_statusbar_location : "bottom",
                    theme_advanced_resizing : false,
                    content_css : "<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( @constant('__PS_BASE_URI__'),'htmlall','UTF-8' ));?>
themes/<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( @constant('_THEME_NAME_'),'htmlall','UTF-8' ));?>
/css/global.css",
                    document_base_url : "<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( @constant('__PS_BASE_URI__'),'htmlall','UTF-8' ));?>
",
                    width: "600",
                    height: "auto",
                    font_size_style_values : "8pt, 10pt, 12pt, 14pt, 18pt, 24pt, 36pt",
                    template_external_list_url : "lists/template_list.js",
                    external_link_list_url : "lists/link_list.js",
                    external_image_list_url : "lists/image_list.js",
                    media_external_list_url : "lists/media_list.js",
                    elements : "nourlconvert",
                    entity_encoding: "raw",
                    convert_urls : false,
                    language : "<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['iso_tiny_mce']->value,'htmlall','UTF-8' ));?>
"
            });
    id_language = Number("<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['id_lang']->value,'htmlall','UTF-8' ));?>
");

    // shop association
    $(".tree-item-name input[type=checkbox]").each(function()
    {
        $(this).prop("checked", false);
        $(this).removeClass("tree-selected");
        $(this).parent().removeClass("tree-selected");
        if ($.inArray($(this).val(), selected_shops) != -1)
        {
            $(this).prop("checked", true);
            $(this).parent().addClass("tree-selected");
            $(this).parents("ul.tree").each(
                function()
                {
                    $(this).children().children().children(".icon-folder-close")
                        .removeClass("icon-folder-close")
                        .addClass("icon-folder-open");
                    $(this).show();
                }
            );
        }
    });

});

function hideOtherLanguage(id)
{
    $('.translatable-field').hide();
    $('.lang-' + id).show();

    var id_old_language = id_language;
    id_language = id;

    if (id_old_language != id)
        changeEmployeeLanguage();

    updateCurrentText();
}

function changeEmployeeLanguage()
{
    if (typeof allowEmployeeFormLang !== 'undefined' && allowEmployeeFormLang)
        $.post("index.php", {
            action: 'formLanguage',
            tab: 'AdminEmployees',
            ajax: 1,
            token: employee_token,
            form_language_id: id_language
        });
}

function updateCurrentText()
{
    $('#current_product').html($('#name_' + id_language).val());
}

function rangeValue(val)
{
	document.getElementById('card_val').value=val; 
}

function readURL(input)
{
    $('#product-image').remove();
    if (input.files && input.files[0])
    {
        var reader = new FileReader();
        reader.onload = function (e)
        {
            $('#preview').show();
            $('#image-thumb').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);

    }
}

function displayDesignTab(tab)
{
    $('.gift_card').hide();
    $('.gift_card_page').removeClass('selected');
    $('#giftcard_' + tab).show();
    $('#giftcard_link_' + tab).addClass('selected');
    $('#currentFormTab').val(tab);
}
<?php echo '</script'; ?>
>
<?php }
}
