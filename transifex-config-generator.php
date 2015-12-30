<?php

// Builds transifex config file
$txProject = 'fabrik31';
$str[] = '[main]';
$str[] = 'host = https://www.transifex.com';
$str[] = 'lang_map = sr_RS@latin: sr-YU, eu: eu-ES, eo: eo-XX, my_MM: my-MM, tr: tr-TR, af_ZA: af-ZA, am_ET: am-ET, ar_AA: ar-AA, ar_AE: ar-AE, ar_BH: ar-BH, ar_DZ: ar-DZ, ar_EG: ar-EG, ar_IQ: ar-IQ, ar_JO: ar-JO, ar_KW: ar-KW, ar_LB: ar-LB, ar_LY: ar-LY, ar_MA: ar-MA, ar_OM: ar-OM, ar_QA: ar-QA, ar_SA: ar-SA, ar_SY: ar-SY, ar_TN: ar-TN, ar_YE: ar-YE, arn_CL: arn-CL, as_IN: as-IN, az_AZ: az-AZ, ba_RU: ba-RU, be_BY: be-BY, bg_BG: bg-BG, bn_BD: bn-BD, bn_IN: bn-IN, bo_CN: bo-CN, br_FR: br-FR, bs_BA: bs-BA, ca_ES: ca-ES, co_FR: co-FR, cs_CZ: cs-CZ, cy_GB: cy-GB, da_DK: da-DK, de_AT: de-AT, de_CH: de-CH, de_DE: de-DE, de_LI: de-LI, de_LU: de-LU, dsb_DE: dsb-DE, dv_MV: dv-MV, el_GR: el-GR, en_AU: en-AU, en_BZ: en-BZ, en_CA: en-CA, en_GB: en-GB, en_IE: en-IE, en_IN: en-IN, en_JM: en-JM, en_MY: en-MY, en_NZ: en-NZ, en_PH: en-PH, en_SG: en-SG, en_TT: en-TT, en_US: en-US, en_ZA: en-ZA, en_ZW: en-ZW, es_AR: es-AR, es_BO: es-BO, es_CL: es-CL, es_CO: es-CO, es_CR: es-CR, es_DO: es-DO, es_EC: es-EC, es_ES: es-ES, es_GT: es-GT, es_HN: es-HN, es_MX: es-MX, es_NI: es-NI, es_PA: es-PA, es_PE: es-PE, es_PR: es-PR, es_PY: es-PY, es_SV: es-SV, es_US: es-US, es_UY: es-UY, es_VE: es-VE, et_EE: et-EE, fa_IR: fa-IR, fi_FI: fi-FI, fil_PH: fil-PH, fo_FO: fo-FO, fr_BE: fr-BE, fr_CA: fr-CA, fr_CH: fr-CH, fr_FR: fr-FR, fr_LU: fr-LU, fr_MC: fr-MC, fy_NL: fy-NL, ga_IE: ga-IE, gd_GB: gd-GB, gl_ES: gl-ES, gsw_FR: gsw-FR, gu_IN: gu-IN, ha_NG: ha-NG, he_IL: he-IL, hi_IN: hi-IN, hr_BA: hr-BA, hr_HR: hr-HR, hsb_DE: hsb-DE, hu_HU: hu-HU, hy_AM: hy-AM, id_ID: id-ID, ig_NG: ig-NG, ii_CN: ii-CN, is_IS: is-IS, it_CH: it-CH, it_IT: it-IT, iu_CA: iu-CA, ja_JP: ja-JP, ka_GE: ka-GE, kk_KZ: kk-KZ, kl_GL: kl-GL, km_KH: km-KH, kn_IN: kn-IN, ko_KR: ko-KR, kok_IN: kok-IN, ky_KG: ky-KG, lb_LU: lb-LU, lo_LA: lo-LA, lt_LT: lt-LT, lv_LV: lv-LV, mi_NZ: mi-NZ, mk_MK: mk-MK, ml_IN: ml-IN, mn_CN: mn-CN, mn_MN: mn-MN, moh_CA: moh-CA, mr_IN: mr-IN, ms_BN: ms-BN, ms_MY: ms-MY, mt_MT: mt-MT, nb_NO: nb-NO, ne_NP: ne-NP, nl_BE: nl-BE, nl_NL: nl-NL, nn_NO: nn-NO, nso_ZA: nso-ZA, oc_FR: oc-FR, or_IN: or-IN, pa_IN: pa-IN, pl_PL: pl-PL, prs_AF: prs-AF, ps_AF: ps-AF, pt_BR: pt-BR, pt_PT: pt-PT, qut_GT: qut-GT, quz_BO: quz-BO, quz_EC: quz-EC, quz_PE: quz-PE, rm_CH: rm-CH, ro_RO: ro-RO, ru_RU: ru-RU, rw_RW: rw-RW, sa_IN: sa-IN, sah_RU: sah-RU, se_FI: se-FI, se_NO: se-NO, se_SE: se-SE, si_LK: si-LK, sk_SK: sk-SK, sl_SI: sl-SI, sma_NO: sma-NO, sma_SE: sma-SE, smj_NO: smj-NO, smj_SE: smj-SE, smn_FI: smn-FI, sms_FI: sms-FI, sq_AL: sq-AL, sr_BA: sr-BA, sr_CS: sr-CS, sr_ME: sr-ME, sv_FI: sv-FI, sv_SE: sv-SE, sw_KE: sw-KE, syr_SY: syr-SY, ta_IN: ta-IN, te_IN: te-IN, tg_TJ: tg-TJ, th_TH: th-TH, tk_TM: tk-TM, tn_ZA: tn-ZA, tt_RU: tt-RU, tzm_DZ: tzm-DZ, ug_CN: ug-CN, uk_UA: uk-UA, ur_PK: ur-PK, uz_UZ: uz-UZ, vi_VN: vi-VN, wo_SN: wo-SN, xh_ZA: xh-ZA, yo_NG: yo-NG, zh_CN: zh-CN, zh_HK: zh-HK, zh_MO: zh-MO, zh_SG: zh-SG, zh_TW: zh-TW, zu_ZA: zu-ZA';
$str[] = 'minimum_perc = 1';
$str[] = 'type = INI';
$str[] = '';

// Admin
$x = array();
$ini = array();

$x[] = '[' . $txProject . '.com_fabrik_admin]';
$x[] = 'file_filter = administrator/components/com_fabrik/language/<lang>/<lang>.com_fabrik.ini';
$x[] = 'source_file = administrator/components/com_fabrik/language/en-GB/en-GB.com_fabrik.ini';
$x[] = 'source_lang = en_GB';

$ini[] = '[' . $txProject . '.com_fabrik_admin_sys]';
$ini[] = 'file_filter = administrator/components/com_fabrik/language/<lang>/<lang>.com_fabrik.sys.ini';
$ini[] = 'source_file = administrator/components/com_fabrik/language/en-GB/en-GB.com_fabrik.sys.ini';
$ini[] = 'source_lang = en_GB';

if ($handle = opendir('administrator/components/com_fabrik/language/'))
{
	while (false !== ($langentry = readdir($handle)))
	{

		if ($langentry !== '.' && $langentry !== '..' && $langentry !== 'en-GB' && $langentry !== 'index.html')
		{
			$x[] = 'trans.' .$langentry. ' = administrator/components/com_fabrik/language/' . $langentry. '/' . $langentry . '.com_fabrik.ini';
			$ini[] = 'trans.' .$langentry. ' = administrator/components/com_fabrik/language/' . $langentry. '/' . $langentry . '.com_fabrik.sys.ini';
		}
	}

	closedir($handle);
	$str[] = implode("\n", $x);
	$str[] = implode("\n", $ini);
}

// Front end
if ($handle = opendir('components/com_fabrik/language/'))
{
	$x = array();
	$ini = array();

	$x[] = '[' . $txProject . '.com_fabrik]';
	$x[] = 'file_filter = components/com_fabrik/language/<lang>/<lang>.com_fabrik.ini';
	$x[] = 'source_file = components/com_fabrik/language/en-GB/en-GB.com_fabrik.ini';
	$x[] = 'source_lang = en_GB';

	while (false !== ($langentry = readdir($handle)))
	{

		if ($langentry !== '.' && $langentry !== '..' && $langentry !== 'en-GB' && $langentry !== 'index.html')
		{
			$x[] = 'trans.' .$langentry. ' = components/com_fabrik/language/' . $langentry. '/' . $langentry . '.com_fabrik.ini';
			$ini[] = 'trans.' .$langentry. ' = components/com_fabrik/language/' . $langentry. '/' . $langentry . '.com_fabrik.sys.ini';
		}
	}

	closedir($handle);
	$str[] = implode("\n", $x);
	$str[] = implode("\n", $ini);
}

// Content plugin
if ($handle = opendir('plugins/content/fabrik/language/'))
{
	$x = array();
	$ini = array();

	$ini[] = '[' . $txProject . '.plg_content_sys]';
	$ini[] = 'file_filter = plugins/content/fabrik/language/<lang>/<lang>.plg_content_fabrik.sys.ini';
	$ini[] = 'source_file = plugins/content/fabrik/language/en-GB/en-GB.plg_content_fabrik.sys.ini';
	$ini[] = 'source_lang = en_GB';

	while (false !== ($langentry = readdir($handle)))
	{

		if ($langentry !== '.' && $langentry !== '..' && $langentry !== 'en-GB' && $langentry !== 'index.html')
		{
			$x[] = 'trans.' .$langentry. ' = plugins/content/fabrik/language/' . $langentry. '/' . $langentry . '.plg_content_fabrik.ini';
			$ini[] = 'trans.' .$langentry. ' = plugins/content/fabrik/language/' . $langentry. '/' . $langentry . '.plg_content_fabrik.sys.ini';
		}
	}

	closedir($handle);
	$str[] = implode("\n", $x);
	$str[] = implode("\n", $ini);
}

$folders = array('cron' => 'plugins/fabrik_cron/', 'element' => 'plugins/fabrik_element/', 'form' => 'plugins/fabrik_form/', 'list' => 'plugins/fabrik_list/');
$folders['validationrule'] = 'plugins/fabrik_validationrule/';
$folders['visualization'] = 'plugins/fabrik_visualization/';


foreach ($folders as $type => $folder)
{
	if ($handle = opendir($folder)) {

		/* This is the correct way to loop over the directory. */
		while (false !== ($entry = readdir($handle)))
		{
			if ($entry !== '.' && $entry !== '..')
			{
				$langFolder = $folder . "$entry/language/";

				if (is_dir($langFolder))
				{
					$langhandle = opendir($langFolder);

					$x = array();
					$ini = array();

					$x[] = '[' . $txProject . '.plg_' . $type . '_' . $entry . ']';
					$x[] = 'file_filter = plugins/fabrik_' . $type . '/' . $entry . '/language/<lang>/<lang>.plg_fabrik_' . $type . '_' . $entry . '.ini';
					$x[] = 'source_file = plugins/fabrik_' . $type . '/' . $entry . '/language/en-GB/en-GB.plg_fabrik_' . $type . '_' . $entry . '.ini';
					$x[] = 'source_lang = en_GB';

					$ini[] = '[' . $txProject . '.plg_' . $type . '_' . $entry . '_sys]';
					$ini[] = 'file_filter = plugins/fabrik_' . $type . '/' . $entry . '/language/<lang>/<lang>.plg_fabrik_' . $type . '_' . $entry . '.sys.ini';
					$ini[] = 'source_file = plugins/fabrik_' . $type . '/' . $entry . '/language/en-GB/en-GB.plg_fabrik_' . $type . '_' . $entry . '.sys.ini';
					$ini[] = 'source_lang = en_GB';

					while (false !== ($langentry = readdir($langhandle)))
					{
						if ($langentry !== '.' && $langentry !== '..' && $langentry !== 'en-GB' && $langentry !== 'index.html')
						{
							$x[] = 'trans.' .$langentry. ' = plugins/fabrik_' . $type . '/' . $entry . '/language/' . $langentry. '/' . $langentry . '.plg_fabrik_' . $type . '_' . $entry . '.ini';
							$ini[] = 'trans.' .$langentry. ' = plugins/fabrik_' . $type . '/' . $entry . '/language/' . $langentry. '/' . $langentry . '.plg_fabrik_' . $type . '_' . $entry . '.sys.ini';
						}
					}

					closedir($langhandle);
					$x[] = '';
					$ini[] = '';

					$str[] = implode("\n", $x);
					$str[] = implode("\n", $ini);
				}
			}
		}

		closedir($handle);
	}
}
file_put_contents('.tx/config', implode("\n", $str));