<?php

if ( ! function_exists( 'cpotheme_metadata_icons' ) ) {
	function cpotheme_metadata_icons() {
		$cpotheme_data = array(
			'fontawesomeregular' => array(
				'name'  => 'Font Awesome 5 Regular',
				'icons' => cpotheme_metadata_fontawesome_regular(),
			),
			'fontawesomebrands' => array(
				'name'  => 'Font Awesome 5 Brands',
				'icons' => cpotheme_metadata_fontawesome_brands(),
			),
			'fontawesomesolid' => array(
				'name'  => 'Font Awesome 5 Solid',
				'icons' => cpotheme_metadata_fontawesome_solid(),
			),
			
		);

		return $cpotheme_data;
	}
}

function cpotheme_check_fontawesome_compatibility( $unicode ){

	$brands = array(
		'&#xf230' => '&#xf082',
		'&#xf16a' => '&#xf167',
		'&#xf166' => '&#xf431',
	);

	$solid = array(
		'&#xf07b' => '&#xf07b',
		'&#xf07c' => '&#xf07c',
		'&#xf1e3' => '&#xf1e3',
		'&#xf0cb' => '&#xf0cb',
		'&#xf044' => '&#xf044',
		'&#xf123' => '&#xf5c0',
		'&#xf204' => '&#xf204',
		'&#xf205' => '&#xf205',
		'&#xf1ce' => '&#xf1ce'
	);

	$regular = array(
		'&#xf003' => '&#xf0e0',
		'&#xf01a' => '&#xf358',
		'&#xf190' => '&#xf359',
		'&#xf18e' => '&#xf35a',
		'&#xf01b' => '&#xf35b',
		'&#xf0a2' => '&#xf0f3',
		'&#xf1f7' => '&#xf1f6',
		'&#xf097' => '&#xf02e',
		'&#xf0f7' => '&#xf1ad',
		'&#xf05d' => '&#xf058',
		'&#xf046' => '&#xf14a',
		'&#xf10c' => '&#xf111',
		'&#xf0e5' => '&#xf075',
		'&#xf0e6' => '&#xf4ad',
		'&#xf016' => '&#xf15b',
		'&#xf0f6' => '&#xf15c',
		'&#xf11d' => '&#xf024',
		'&#xf114' => '&#xf07b',
		'&#xf115' => '&#xf07c',
		'&#xf119' => '&#xf119',
		'&#xf0a7' => '&#xf0a7',
		'&#xf0a5' => '&#xf0a5',
		'&#xf0a4' => '&#xf0a4',
		'&#xf0a6' => '&#xf0a6',
		'&#xf0a0' => '&#xf0a0',
		'&#xf08a' => '&#xf004',
		'&#xf0f8' => '&#xf0f8',
		'&#xf11c' => '&#xf11c',
		'&#xf094' => '&#xf094',
		'&#xf0eb' => '&#xf0eb',
		'&#xf11a' => '&#xf11a',
		'&#xf147' => '&#xf146',
		'&#xf186' => '&#xf186',
		'&#xf1ea' => '&#xf1ea',
		'&#xf03e' => '&#xf03e',
		'&#xf01d' => '&#xf144',
		'&#xf196' => '&#xf0fe',
		'&#xf1d9' => '&#xf1d8',
		'&#xf045' => '&#xf14d',
		'&#xf118' => '&#xf118',
		'&#xf096' => '&#xf0c8',
		'&#xf006' => '&#xf005',
		'&#xf185' => '&#xf185',
		'&#xf088' => '&#xf165',
		'&#xf087' => '&#xf164',
		'&#xf05c' => '&#xf057',
		'&#xf014' => '&#xf2ed',
		'&#xf1f8' => '&#xf2ed',
		'&#xf133' => '&#xf133',
		'&#xf150' => '&#xf150',
		'&#xf191' => '&#xf191',
		'&#xf152' => '&#xf152',
		'&#xf151' => '&#xf151',
		'&#xf017' => '&#xf017',
		'&#xf192' => '&#xf192',
		'&#xf1c1' => '&#xf1c1',
		'&#xf1c2' => '&#xf1c2',
		'&#xf1c3' => '&#xf1c3',
		'&#xf1c4' => '&#xf1c4',
		'&#xf1c5' => '&#xf1c5',
		'&#xf1c6' => '&#xf1c6',
		'&#xf1c7' => '&#xf1c7',
		'&#xf1c8' => '&#xf1c8',
		'&#xf1c9' => '&#xf1c9',
		'&#xf0c5' => '&#xf0c5',
		'&#xf0c7' => '&#xf0c7',
	);

	if ( isset( $brands[ $unicode ] ) ) {
		return array( 'fontawesomebrands', $brands[ $unicode ] );
	}

	if ( isset( $solid[ $unicode ] ) ) {
		return array( 'fontawesomesolid', $solid[ $unicode ] );
	}

	if ( isset( $regular[ $unicode ] ) ) {
		return array( 'fontawesomeregular', $regular[ $unicode ] );
	}

	return $unicode;

}

if ( ! function_exists( 'cpotheme_metadata_fontawesome_regular' ) ) {
    function cpotheme_metadata_fontawesome_regular() {
        $icons = array( '&#xf2b9', '&#xf2bb', '&#xf556', '&#xf358', '&#xf359', '&#xf35a', '&#xf35b', '&#xf0f3', '&#xf1f6', '&#xf02e', '&#xf1ad', '&#xf133', '&#xf073', '&#xf274', '&#xf272', '&#xf271', '&#xf273', '&#xf150', '&#xf191', '&#xf152', '&#xf151', '&#xf080', '&#xf058', '&#xf14a', '&#xf111', '&#xf328', '&#xf017', '&#xf24d', '&#xf20a', '&#xf075', '&#xf27a', '&#xf4ad', '&#xf086', '&#xf14e', '&#xf0c5', '&#xf1f9', '&#xf09d', '&#xf567', '&#xf192', '&#xf044', '&#xf0e0', '&#xf2b6', '&#xf06e', '&#xf070', '&#xf15b', '&#xf15c', '&#xf1c6', '&#xf1c7', '&#xf1c9', '&#xf1c3', '&#xf1c5', '&#xf1c1', '&#xf1c4', '&#xf1c8', '&#xf1c2', '&#xf024', '&#xf579', '&#xf07b', '&#xf07c', '&#xf119', '&#xf57a', '&#xf1e3', '&#xf3a5', '&#xf57f', '&#xf580', '&#xf581', '&#xf582', '&#xf583', '&#xf584', '&#xf585', '&#xf586', '&#xf587', '&#xf588', '&#xf589', '&#xf58a', '&#xf58b', '&#xf58c', '&#xf258', '&#xf256', '&#xf25b', '&#xf0a7', '&#xf0a5', '&#xf0a4', '&#xf0a6', '&#xf25a', '&#xf255', '&#xf257', '&#xf259', '&#xf2b5', '&#xf0a0', '&#xf004', '&#xf0f8', '&#xf254', '&#xf2c1', '&#xf2c2', '&#xf03e', '&#xf302', '&#xf11c', '&#xf596', '&#xf597', '&#xf598', '&#xf599', '&#xf59a', '&#xf59b', '&#xf59c', '&#xf094', '&#xf1cd', '&#xf0eb', '&#xf022', '&#xf279', '&#xf11a', '&#xf5a4', '&#xf5a5', '&#xf146', '&#xf3d1', '&#xf186', '&#xf1ea', '&#xf247', '&#xf248', '&#xf1d8', '&#xf28b', '&#xf144', '&#xf0fe', '&#xf059', '&#xf25d', '&#xf5b3', '&#xf5b4', '&#xf0c7', '&#xf14d', '&#xf118', '&#xf5b8', '&#xf4da', '&#xf2dc', '&#xf0c8', '&#xf005', '&#xf089', '&#xf249', '&#xf28d', '&#xf185', '&#xf5c2', '&#xf165', '&#xf164', '&#xf057', '&#xf5c8', '&#xf2ed', '&#xf007', '&#xf2bd', '&#xf410', '&#xf2d0', '&#xf2d1', '&#xf2d2'
        );

        return array_combine( $icons, $icons );
    }
}

if ( ! function_exists( 'cpotheme_metadata_fontawesome_solid' ) ) {
	function cpotheme_metadata_fontawesome_solid() {
		$icons = array( '&#xf641','&#xf2b9','&#xf2bb','&#xf042','&#xf5d0','&#xf037','&#xf039','&#xf036','&#xf038','&#xf461','&#xf0f9','&#xf2a3','&#xf13d','&#xf103','&#xf100','&#xf101','&#xf102','&#xf107','&#xf104','&#xf105','&#xf106','&#xf556','&#xf644','&#xf5d1','&#xf187','&#xf557','&#xf358','&#xf359','&#xf35a','&#xf35b','&#xf0ab','&#xf0a8','&#xf0a9','&#xf0aa','&#xf063','&#xf060','&#xf061','&#xf062','&#xf0b2','&#xf337','&#xf338','&#xf2a2','&#xf069','&#xf1fa','&#xf558','&#xf5d2','&#xf29e','&#xf559','&#xf77c','&#xf77d','&#xf55a','&#xf04a','&#xf7e5','&#xf24e','&#xf515','&#xf516','&#xf05e','&#xf462','&#xf02a','&#xf0c9','&#xf433','&#xf434','&#xf2cd','&#xf244','&#xf240','&#xf242','&#xf243','&#xf241','&#xf236','&#xf0fc','&#xf0f3','&#xf1f6','&#xf55b','&#xf647','&#xf206','&#xf84a','&#xf1e5','&#xf780','&#xf1fd','&#xf517','&#xf6b6','&#xf29d','&#xf781','&#xf032','&#xf0e7','&#xf1e2','&#xf5d7','&#xf55c','&#xf02d','&#xf6b7','&#xf7e6','&#xf518','&#xf5da','&#xf02e','&#xf84c','&#xf850','&#xf853','&#xf436','&#xf466','&#xf49e','&#xf468','&#xf2a1','&#xf5dc','&#xf7ec','&#xf0b1','&#xf469','&#xf519','&#xf51a','&#xf55d','&#xf188','&#xf1ad','&#xf0a1','&#xf140','&#xf46a','&#xf207','&#xf55e','&#xf64a','&#xf1ec','&#xf133','&#xf073','&#xf274','&#xf783','&#xf272','&#xf271','&#xf273','&#xf784','&#xf030','&#xf083','&#xf6bb','&#xf786','&#xf55f','&#xf46b','&#xf1b9','&#xf5de','&#xf5df','&#xf5e1','&#xf5e4','&#xf0d7','&#xf0d9','&#xf0da','&#xf150','&#xf191','&#xf152','&#xf151','&#xf0d8','&#xf787','&#xf218','&#xf217','&#xf788','&#xf6be','&#xf0a3','&#xf6c0','&#xf51b','&#xf51c','&#xf5e7','&#xf1fe','&#xf080','&#xf201','&#xf200','&#xf00c','&#xf058','&#xf560','&#xf14a','&#xf7ef','&#xf439','&#xf43a','&#xf43c','&#xf43f','&#xf441','&#xf443','&#xf445','&#xf447','&#xf13a','&#xf137','&#xf138','&#xf139','&#xf078','&#xf053','&#xf054','&#xf077','&#xf1ae','&#xf51d','&#xf111','&#xf1ce','&#xf64f','&#xf7f2','&#xf328','&#xf46c','&#xf46d','&#xf017','&#xf24d','&#xf20a','&#xf0c2','&#xf381','&#xf73b','&#xf6c3','&#xf73c','&#xf73d','&#xf740','&#xf6c4','&#xf743','&#xf382','&#xf561','&#xf121','&#xf126','&#xf0f4','&#xf013','&#xf085','&#xf51e','&#xf0db','&#xf075','&#xf27a','&#xf651','&#xf4ad','&#xf7f5','&#xf4b3','&#xf086','&#xf653','&#xf51f','&#xf14e','&#xf066','&#xf78c','&#xf562','&#xf563','&#xf564','&#xf0c5','&#xf1f9','&#xf4b8','&#xf09d','&#xf125','&#xf565','&#xf654','&#xf05b','&#xf520','&#xf521','&#xf7f7','&#xf1b2','&#xf1b3','&#xf0c4','&#xf1c0','&#xf2a4','&#xf747','&#xf108','&#xf655','&#xf470','&#xf522','&#xf6cf','&#xf6d1','&#xf523','&#xf524','&#xf525','&#xf526','&#xf527','&#xf528','&#xf566','&#xf5eb','&#xf529','&#xf567','&#xf471','&#xf6d3','&#xf155','&#xf472','&#xf474','&#xf4b9','&#xf52a','&#xf52b','&#xf192','&#xf4ba','&#xf019','&#xf568','&#xf6d5','&#xf5ee','&#xf569','&#xf56a','&#xf6d7','&#xf44b','&#xf793','&#xf794','&#xf6d9','&#xf044','&#xf7fb','&#xf052','&#xf141','&#xf142','&#xf0e0','&#xf2b6','&#xf658','&#xf199','&#xf52c','&#xf12d','&#xf796','&#xf153','&#xf362','&#xf12a','&#xf06a','&#xf071','&#xf065','&#xf31e','&#xf35d','&#xf360','&#xf06e','&#xf1fb','&#xf070','&#xf863','&#xf049','&#xf050','&#xf1ac','&#xf52d','&#xf56b','&#xf182','&#xf0fb','&#xf15b','&#xf15c','&#xf1c6','&#xf1c7','&#xf1c9','&#xf56c','&#xf6dd','&#xf56d','&#xf1c3','&#xf56e','&#xf1c5','&#xf56f','&#xf570','&#xf571','&#xf477','&#xf478','&#xf1c1','&#xf1c4','&#xf572','&#xf573','&#xf574','&#xf1c8','&#xf1c2','&#xf575','&#xf576','&#xf008','&#xf0b0','&#xf577','&#xf06d','&#xf7e4','&#xf134','&#xf479','&#xf578','&#xf6de','&#xf024','&#xf11e','&#xf74d','&#xf0c3','&#xf579','&#xf07b','&#xf65d','&#xf07c','&#xf65e','&#xf031','&#xf44e','&#xf04e','&#xf52e','&#xf119','&#xf57a','&#xf662','&#xf1e3','&#xf11b','&#xf52f','&#xf0e3','&#xf3a5','&#xf22d','&#xf6e2','&#xf06b','&#xf79c','&#xf79f','&#xf000','&#xf57b','&#xf7a0','&#xf530','&#xf0ac','&#xf57c','&#xf57d','&#xf57e','&#xf7a2','&#xf450','&#xf664','&#xf19d','&#xf531','&#xf532','&#xf57f','&#xf580','&#xf581','&#xf582','&#xf583','&#xf584','&#xf585','&#xf586','&#xf587','&#xf588','&#xf589','&#xf58a','&#xf58b','&#xf58c','&#xf58d','&#xf7a4','&#xf7a5','&#xf58e','&#xf7a6','&#xf0fd','&#xf805','&#xf6e3','&#xf665','&#xf4bd','&#xf4be','&#xf4c0','&#xf258','&#xf806','&#xf256','&#xf25b','&#xf0a7','&#xf0a5','&#xf0a4','&#xf0a6','&#xf25a','&#xf255','&#xf257','&#xf259','&#xf4c2','&#xf4c4','&#xf2b5','&#xf6e6','&#xf807','&#xf292','&#xf6e8','&#xf666','&#xf0a0','&#xf1dc','&#xf025','&#xf58f','&#xf590','&#xf004','&#xf7a9','&#xf21e','&#xf533','&#xf591','&#xf6ec','&#xf6ed','&#xf1da','&#xf453','&#xf7aa','&#xf015','&#xf6f0','&#xf7ab','&#xf0f8','&#xf47d','&#xf47e','&#xf593','&#xf80f','&#xf594','&#xf254','&#xf253','&#xf252','&#xf251','&#xf6f1','&#xf6f2','&#xf246','&#xf810','&#xf7ad','&#xf86d','&#xf2c1','&#xf2c2','&#xf47f','&#xf7ae','&#xf03e','&#xf302','&#xf01c','&#xf03c','&#xf275','&#xf534','&#xf129','&#xf05a','&#xf033','&#xf669','&#xf595','&#xf66a','&#xf66b','&#xf084','&#xf11c','&#xf66d','&#xf596','&#xf597','&#xf598','&#xf535','&#xf66f','&#xf1ab','&#xf109','&#xf5fc','&#xf812','&#xf599','&#xf59a','&#xf59b','&#xf59c','&#xf5fd','&#xf06c','&#xf094','&#xf536','&#xf537','&#xf3be','&#xf3bf','&#xf1cd','&#xf0eb','&#xf0c1','&#xf195','&#xf03a','&#xf022','&#xf0cb','&#xf0ca','&#xf124','&#xf023','&#xf3c1','&#xf309','&#xf30a','&#xf30b','&#xf30c','&#xf2a8','&#xf59d','&#xf0d0','&#xf076','&#xf674','&#xf183','&#xf279','&#xf59f','&#xf5a0','&#xf041','&#xf3c5','&#xf276','&#xf277','&#xf5a1','&#xf222','&#xf227','&#xf229','&#xf22b','&#xf22a','&#xf6fa','&#xf5a2','&#xf0fa','&#xf11a','&#xf5a4','&#xf5a5','&#xf538','&#xf676','&#xf223','&#xf753','&#xf2db','&#xf130','&#xf3c9','&#xf539','&#xf131','&#xf610','&#xf068','&#xf056','&#xf146','&#xf7b5','&#xf10b','&#xf3cd','&#xf0d6','&#xf3d1','&#xf53a','&#xf53b','&#xf53c','&#xf53d','&#xf5a6','&#xf186','&#xf5a7','&#xf678','&#xf21c','&#xf6fc','&#xf245','&#xf7b6','&#xf001','&#xf6ff','&#xf22c','&#xf1ea','&#xf53e','&#xf481','&#xf247','&#xf248','&#xf613','&#xf679','&#xf700','&#xf03b','&#xf815','&#xf1fc','&#xf5aa','&#xf53f','&#xf482','&#xf1d8','&#xf0c6','&#xf4cd','&#xf1dd','&#xf540','&#xf5ab','&#xf67b','&#xf0ea','&#xf04c','&#xf28b','&#xf1b0','&#xf67c','&#xf304','&#xf305','&#xf5ac','&#xf5ad','&#xf14b','&#xf303','&#xf5ae','&#xf4ce','&#xf816','&#xf295','&#xf541','&#xf756','&#xf095','&#xf879','&#xf3dd','&#xf098','&#xf87b','&#xf2a0','&#xf87c','&#xf4d3','&#xf484','&#xf818','&#xf67f','&#xf072','&#xf5af','&#xf5b0','&#xf04b','&#xf144','&#xf1e6','&#xf067','&#xf055','&#xf0fe','&#xf2ce','&#xf681','&#xf682','&#xf2fe','&#xf75a','&#xf619','&#xf3e0','&#xf154','&#xf011','&#xf683','&#xf684','&#xf5b1','&#xf485','&#xf486','&#xf02f','&#xf487','&#xf542','&#xf12e','&#xf029','&#xf128','&#xf059','&#xf458','&#xf10d','&#xf10e','&#xf687','&#xf7b9','&#xf7ba','&#xf75b','&#xf074','&#xf543','&#xf1b8','&#xf01e','&#xf2f9','&#xf25d','&#xf87d','&#xf3e5','&#xf122','&#xf75e','&#xf7bd','&#xf079','&#xf4d6','&#xf70b','&#xf018','&#xf544','&#xf135','&#xf4d7','&#xf09e','&#xf143','&#xf158','&#xf545','&#xf546','&#xf547','&#xf548','&#xf70c','&#xf156','&#xf5b3','&#xf5b4','&#xf7bf','&#xf7c0','&#xf0c7','&#xf549','&#xf54a','&#xf70e','&#xf7c2','&#xf002','&#xf688','&#xf689','&#xf010','&#xf00e','&#xf4d8','&#xf233','&#xf61f','&#xf064','&#xf1e0','&#xf1e1','&#xf14d','&#xf20b','&#xf3ed','&#xf21a','&#xf48b','&#xf54b','&#xf290','&#xf291','&#xf07a','&#xf2cc','&#xf5b6','&#xf4d9','&#xf2f6','&#xf2a7','&#xf2f5','&#xf012','&#xf5b7','&#xf7c4','&#xf0e8','&#xf7c5','&#xf7c9','&#xf7ca','&#xf54c','&#xf714','&#xf715','&#xf7cc','&#xf1de','&#xf118','&#xf5b8','&#xf4da','&#xf75f','&#xf48d','&#xf54d','&#xf7cd','&#xf7ce','&#xf2dc','&#xf7d0','&#xf7d2','&#xf696','&#xf5ba','&#xf0dc','&#xf15d','&#xf881','&#xf15e','&#xf882','&#xf160','&#xf884','&#xf161','&#xf885','&#xf0dd','&#xf162','&#xf886','&#xf163','&#xf887','&#xf0de','&#xf5bb','&#xf197','&#xf891','&#xf717','&#xf110','&#xf5bc','&#xf5bd','&#xf0c8','&#xf45c','&#xf698','&#xf5bf','&#xf005','&#xf699','&#xf089','&#xf5c0','&#xf69a','&#xf621','&#xf048','&#xf051','&#xf0f1','&#xf249','&#xf04d','&#xf28d','&#xf2f2','&#xf54e','&#xf54f','&#xf550','&#xf21d','&#xf0cc','&#xf551','&#xf12c','&#xf239','&#xf0f2','&#xf5c1','&#xf185','&#xf12b','&#xf5c2','&#xf5c3','&#xf5c4','&#xf5c5','&#xf69b','&#xf021','&#xf2f1','&#xf48e','&#xf0ce','&#xf45d','&#xf10a','&#xf3fa','&#xf490','&#xf3fd','&#xf02b','&#xf02c','&#xf4db','&#xf0ae','&#xf1ba','&#xf62e','&#xf62f','&#xf769','&#xf76b','&#xf7d7','&#xf120','&#xf034','&#xf035','&#xf00a','&#xf009','&#xf00b','&#xf630','&#xf491','&#xf2cb','&#xf2c7','&#xf2c9','&#xf2ca','&#xf2c8','&#xf165','&#xf164','&#xf08d','&#xf3ff','&#xf00d','&#xf057','&#xf043','&#xf5c7','&#xf5c8','&#xf204','&#xf205','&#xf7d8','&#xf71e','&#xf552','&#xf7d9','&#xf5c9','&#xf6a0','&#xf6a1','&#xf722','&#xf25c','&#xf637','&#xf238','&#xf7da','&#xf224','&#xf225','&#xf1f8','&#xf2ed','&#xf829','&#xf82a','&#xf1bb','&#xf091','&#xf0d1','&#xf4de','&#xf63b','&#xf4df','&#xf63c','&#xf553','&#xf1e4','&#xf26c','&#xf0e9','&#xf5ca','&#xf0cd','&#xf0e2','&#xf2ea','&#xf29a','&#xf19c','&#xf127','&#xf09c','&#xf13e','&#xf093','&#xf007','&#xf406','&#xf4fa','&#xf4fb','&#xf4fc','&#xf2bd','&#xf4fd','&#xf4fe','&#xf4ff','&#xf500','&#xf501','&#xf728','&#xf502','&#xf0f0','&#xf503','&#xf504','&#xf82f','&#xf234','&#xf21b','&#xf505','&#xf506','&#xf507','&#xf508','&#xf235','&#xf0c0','&#xf509','&#xf2e5','&#xf2e7','&#xf5cb','&#xf221','&#xf226','&#xf228','&#xf492','&#xf493','&#xf03d','&#xf4e2','&#xf6a7','&#xf897','&#xf45f','&#xf027','&#xf6a9','&#xf026','&#xf028','&#xf772','&#xf729','&#xf554','&#xf555','&#xf494','&#xf773','&#xf83e','&#xf496','&#xf5cd','&#xf193','&#xf1eb','&#xf72e','&#xf410','&#xf2d0','&#xf2d1','&#xf2d2','&#xf72f','&#xf4e3','&#xf5ce','&#xf159','&#xf0ad','&#xf497','&#xf157','&#xf6ad'
		);

		return array_combine( $icons, $icons );
	}
}


if ( ! function_exists( 'cpotheme_metadata_fontawesome_brands') ) {
	function cpotheme_metadata_fontawesome_brands() {
		$icons = array( '&#xf26e','&#xf368','&#xf369','&#xf6af','&#xf170','&#xf778','&#xf36a','&#xf36b','&#xf834','&#xf36c','&#xf642','&#xf270','&#xf42c','&#xf36d','&#xf17b','&#xf209','&#xf36e','&#xf420','&#xf36f','&#xf370','&#xf371','&#xf179','&#xf415','&#xf77a','&#xf372','&#xf77b','&#xf373','&#xf41c','&#xf374','&#xf421','&#xf375','&#xf2d5','&#xf835','&#xf1b4','&#xf1b5','&#xf378','&#xf171','&#xf379','&#xf37a','&#xf27e','&#xf37b','&#xf37c','&#xf37d','&#xf293','&#xf294','&#xf836','&#xf15a','&#xf837','&#xf37f','&#xf20d','&#xf785','&#xf42d','&#xf1f3','&#xf416','&#xf24c','&#xf1f2','&#xf24b','&#xf1f1','&#xf1f4','&#xf1f5','&#xf1f0','&#xf380','&#xf789','&#xf268','&#xf838','&#xf383','&#xf384','&#xf385','&#xf1cb','&#xf284','&#xf78d','&#xf20e','&#xf26d','&#xf388','&#xf25e','&#xf4e7','&#xf4e8','&#xf4e9','&#xf4ea','&#xf4eb','&#xf4ec','&#xf4ed','&#xf4ee','&#xf4ef','&#xf4f0','&#xf4f1','&#xf4f2','&#xf4f3','&#xf6c9','&#xf13c','&#xf38b','&#xf38c','&#xf38d','&#xf6ca','&#xf210','&#xf1a5','&#xf38e','&#xf38f','&#xf6cc','&#xf1bd','&#xf790','&#xf791','&#xf1a6','&#xf391','&#xf392','&#xf393','&#xf394','&#xf395','&#xf396','&#xf17d','&#xf397','&#xf16b','&#xf1a9','&#xf399','&#xf39a','&#xf4f4','&#xf282','&#xf430','&#xf5f1','&#xf423','&#xf1d1','&#xf299','&#xf39d','&#xf42e','&#xf2d7','&#xf839','&#xf23e','&#xf09a','&#xf39e','&#xf39f','&#xf082','&#xf6dc','&#xf797','&#xf798','&#xf799','&#xf269','&#xf2b0','&#xf50a','&#xf3a1','&#xf16e','&#xf44d','&#xf417','&#xf2b4','&#xf35c','&#xf425','&#xf280','&#xf3a2','&#xf286','&#xf3a3','&#xf211','&#xf180','&#xf2c5','&#xf3a4','&#xf50b','&#xf50c','&#xf50d','&#xf265','&#xf260','&#xf261','&#xf1d3','&#xf841','&#xf1d2','&#xf09b','&#xf113','&#xf092','&#xf3a6','&#xf296','&#xf426','&#xf2a5','&#xf2a6','&#xf3a7','&#xf3a8','&#xf3a9','&#xf1a0','&#xf3aa','&#xf3ab','&#xf2b3','&#xf0d5','&#xf0d4','&#xf1ee','&#xf184','&#xf2d6','&#xf3ac','&#xf3ad','&#xf3ae','&#xf1d4','&#xf3af','&#xf5f7','&#xf452','&#xf3b0','&#xf427','&#xf592','&#xf3b1','&#xf27c','&#xf13b','&#xf3b2','&#xf2d8','&#xf16d','&#xf7af','&#xf26b','&#xf7b0','&#xf208','&#xf83a','&#xf3b4','&#xf3b5','&#xf4e4','&#xf50e','&#xf3b6','&#xf7b1','&#xf3b7','&#xf1aa','&#xf3b8','&#xf3b9','&#xf1cc','&#xf5fa','&#xf4f5','&#xf3ba','&#xf3bb','&#xf3bc','&#xf42f','&#xf3bd','&#xf202','&#xf203','&#xf212','&#xf41d','&#xf3c0','&#xf08c','&#xf0e1','&#xf2b8','&#xf17c','&#xf3c3','&#xf3c4','&#xf59e','&#xf50f','&#xf60f','&#xf4f6','&#xf136','&#xf3c6','&#xf23a','&#xf3c7','&#xf3c8','&#xf2e0','&#xf5a3','&#xf7b3','&#xf3ca','&#xf3cb','&#xf289','&#xf3cc','&#xf285','&#xf3d0','&#xf3d2','&#xf612','&#xf5a8','&#xf419','&#xf3d3','&#xf3d4','&#xf3d5','&#xf3d6','&#xf263','&#xf264','&#xf510','&#xf23d','&#xf19b','&#xf26a','&#xf23c','&#xf41a','&#xf3d7','&#xf18c','&#xf3d8','&#xf3d9','&#xf1ed','&#xf704','&#xf3da','&#xf3db','&#xf3dc','&#xf511','&#xf457','&#xf2ae','&#xf1a8','&#xf4e5','&#xf1a7','&#xf0d2','&#xf231','&#xf0d3','&#xf3df','&#xf288','&#xf3e1','&#xf3e2','&#xf1d6','&#xf459','&#xf2c4','&#xf4f7','&#xf7bb','&#xf2d9','&#xf41b','&#xf75d','&#xf4d5','&#xf1d0','&#xf3e3','&#xf1a1','&#xf281','&#xf1a2','&#xf7bc','&#xf18b','&#xf3e6','&#xf4f8','&#xf3e7','&#xf5b2','&#xf3e8','&#xf3e9','&#xf267','&#xf83b','&#xf41e','&#xf3ea','&#xf28a','&#xf3eb','&#xf2da','&#xf213','&#xf3ec','&#xf214','&#xf5b5','&#xf215','&#xf3ee','&#xf512','&#xf7c6','&#xf216','&#xf17e','&#xf198','&#xf3ef','&#xf1e7','&#xf2ab','&#xf2ac','&#xf2ad','&#xf1be','&#xf7d3','&#xf3f3','&#xf83c','&#xf1bc','&#xf5be','&#xf18d','&#xf16c','&#xf842','&#xf3f5','&#xf1b6','&#xf1b7','&#xf3f6','&#xf3f7','&#xf428','&#xf429','&#xf42a','&#xf3f8','&#xf1a4','&#xf1a3','&#xf2dd','&#xf3f9','&#xf7d6','&#xf83d','&#xf4f9','&#xf2c6','&#xf3fe','&#xf1d5','&#xf69d','&#xf5c6','&#xf2b2','&#xf731','&#xf513','&#xf181','&#xf262','&#xf173','&#xf174','&#xf1e8','&#xf099','&#xf081','&#xf42b','&#xf402','&#xf7df','&#xf403','&#xf404','&#xf405','&#xf7e0','&#xf287','&#xf7e1','&#xf407','&#xf408','&#xf237','&#xf2a9','&#xf2aa','&#xf409','&#xf40a','&#xf194','&#xf27d','&#xf1ca','&#xf189','&#xf40b','&#xf41f','&#xf83f','&#xf5cc','&#xf18a','&#xf1d7','&#xf232','&#xf40c','&#xf40d','&#xf266','&#xf17a','&#xf5cf','&#xf730','&#xf514','&#xf19a','&#xf411','&#xf297','&#xf2de','&#xf298','&#xf3e4','&#xf412','&#xf168','&#xf169','&#xf23b','&#xf19e','&#xf840','&#xf413','&#xf414','&#xf7e3','&#xf1e9','&#xf2b1','&#xf167','&#xf431','&#xf63f'
		);
		return array_combine( $icons, $icons );
	}
}

if ( ! function_exists( 'cpotheme_metadata_linearicons' ) ) {
	function cpotheme_metadata_linearicons() {
		$data = array(
			'&#xe800' => '&#xe800',
			'&#xe801' => '&#xe801',
			'&#xe802' => '&#xe802',
			'&#xe803' => '&#xe803',
			'&#xe804' => '&#xe804',
			'&#xe805' => '&#xe805',
			'&#xe806' => '&#xe806',
			'&#xe807' => '&#xe807',
			'&#xe808' => '&#xe808',
			'&#xe809' => '&#xe809',
			'&#xe80a' => '&#xe80a',
			'&#xe80b' => '&#xe80b',
			'&#xe80c' => '&#xe80c',
			'&#xe80d' => '&#xe80d',
			'&#xe80e' => '&#xe80e',
			'&#xe80f' => '&#xe80f',
			'&#xe810' => '&#xe810',
			'&#xe811' => '&#xe811',
			'&#xe812' => '&#xe812',
			'&#xe813' => '&#xe813',
			'&#xe814' => '&#xe814',
			'&#xe815' => '&#xe815',
			'&#xe816' => '&#xe816',
			'&#xe817' => '&#xe817',
			'&#xe818' => '&#xe818',
			'&#xe819' => '&#xe819',
			'&#xe81a' => '&#xe81a',
			'&#xe81b' => '&#xe81b',
			'&#xe81c' => '&#xe81c',
			'&#xe81d' => '&#xe81d',
			'&#xe81e' => '&#xe81e',
			'&#xe81f' => '&#xe81f',
			'&#xe820' => '&#xe820',
			'&#xe821' => '&#xe821',
			'&#xe822' => '&#xe822',
			'&#xe823' => '&#xe823',
			'&#xe824' => '&#xe824',
			'&#xe825' => '&#xe825',
			'&#xe826' => '&#xe826',
			'&#xe827' => '&#xe827',
			'&#xe828' => '&#xe828',
			'&#xe829' => '&#xe829',
			'&#xe82a' => '&#xe82a',
			'&#xe82b' => '&#xe82b',
			'&#xe82c' => '&#xe82c',
			'&#xe82d' => '&#xe82d',
			'&#xe82e' => '&#xe82e',
			'&#xe82f' => '&#xe82f',
			'&#xe830' => '&#xe830',
			'&#xe831' => '&#xe831',
			'&#xe832' => '&#xe832',
			'&#xe833' => '&#xe833',
			'&#xe834' => '&#xe834',
			'&#xe835' => '&#xe835',
			'&#xe836' => '&#xe836',
			'&#xe837' => '&#xe837',
			'&#xe838' => '&#xe838',
			'&#xe839' => '&#xe839',
			'&#xe83a' => '&#xe83a',
			'&#xe83b' => '&#xe83b',
			'&#xe83c' => '&#xe83c',
			'&#xe83d' => '&#xe83d',
			'&#xe83e' => '&#xe83e',
			'&#xe83f' => '&#xe83f',
			'&#xe840' => '&#xe840',
			'&#xe841' => '&#xe841',
			'&#xe842' => '&#xe842',
			'&#xe843' => '&#xe843',
			'&#xe844' => '&#xe844',
			'&#xe845' => '&#xe845',
			'&#xe846' => '&#xe846',
			'&#xe847' => '&#xe847',
			'&#xe848' => '&#xe848',
			'&#xe849' => '&#xe849',
			'&#xe84a' => '&#xe84a',
			'&#xe84b' => '&#xe84b',
			'&#xe84c' => '&#xe84c',
			'&#xe84d' => '&#xe84d',
			'&#xe84e' => '&#xe84e',
			'&#xe84f' => '&#xe84f',
			'&#xe850' => '&#xe850',
			'&#xe851' => '&#xe851',
			'&#xe852' => '&#xe852',
			'&#xe853' => '&#xe853',
			'&#xe854' => '&#xe854',
			'&#xe855' => '&#xe855',
			'&#xe856' => '&#xe856',
			'&#xe857' => '&#xe857',
			'&#xe858' => '&#xe858',
			'&#xe859' => '&#xe859',
			'&#xe85a' => '&#xe85a',
			'&#xe85b' => '&#xe85b',
			'&#xe85c' => '&#xe85c',
			'&#xe85d' => '&#xe85d',
			'&#xe85e' => '&#xe85e',
			'&#xe85f' => '&#xe85f',
			'&#xe860' => '&#xe860',
			'&#xe861' => '&#xe861',
			'&#xe862' => '&#xe862',
			'&#xe863' => '&#xe863',
			'&#xe864' => '&#xe864',
			'&#xe865' => '&#xe865',
			'&#xe866' => '&#xe866',
			'&#xe867' => '&#xe867',
			'&#xe868' => '&#xe868',
			'&#xe869' => '&#xe869',
			'&#xe86a' => '&#xe86a',
			'&#xe86b' => '&#xe86b',
			'&#xe86c' => '&#xe86c',
			'&#xe86d' => '&#xe86d',
			'&#xe86e' => '&#xe86e',
			'&#xe86f' => '&#xe86f',
			'&#xe870' => '&#xe870',
			'&#xe871' => '&#xe871',
			'&#xe872' => '&#xe872',
			'&#xe873' => '&#xe873',
			'&#xe874' => '&#xe874',
			'&#xe875' => '&#xe875',
			'&#xe876' => '&#xe876',
			'&#xe877' => '&#xe877',
			'&#xe878' => '&#xe878',
			'&#xe879' => '&#xe879',
			'&#xe87a' => '&#xe87a',
			'&#xe87b' => '&#xe87b',
			'&#xe87c' => '&#xe87c',
			'&#xe87d' => '&#xe87d',
			'&#xe87e' => '&#xe87e',
			'&#xe87f' => '&#xe87f',
			'&#xe880' => '&#xe880',
			'&#xe881' => '&#xe881',
			'&#xe882' => '&#xe882',
			'&#xe883' => '&#xe883',
			'&#xe884' => '&#xe884',
			'&#xe885' => '&#xe885',
			'&#xe886' => '&#xe886',
			'&#xe887' => '&#xe887',
			'&#xe888' => '&#xe888',
			'&#xe889' => '&#xe889',
			'&#xe88a' => '&#xe88a',
			'&#xe88b' => '&#xe88b',
			'&#xe88c' => '&#xe88c',
			'&#xe88d' => '&#xe88d',
			'&#xe88e' => '&#xe88e',
			'&#xe88f' => '&#xe88f',
			'&#xe890' => '&#xe890',
			'&#xe891' => '&#xe891',
			'&#xe892' => '&#xe892',
			'&#xe893' => '&#xe893',
			'&#xe894' => '&#xe894',
			'&#xe895' => '&#xe895',
			'&#xe896' => '&#xe896',
			'&#xe897' => '&#xe897',
			'&#xe898' => '&#xe898',
			'&#xe899' => '&#xe899',
			'&#xe89a' => '&#xe89a',
		);

		return $data;
	}
}


//Icon list (filtered for social icons)
if ( ! function_exists( 'cpotheme_metadata_icons_social' ) ) {
	function cpotheme_metadata_icons_social() {
		$cpotheme_data = array(
			'0'        => '--',
			'&#xf09a;' => '&#xf09a', //Facebook
			'&#xf099;' => '&#xf099', //Twitter
			'&#xf0d5;' => '&#xf0d5', //Gplus
			'&#xf167;' => '&#xf167', //YouTube
			'&#xf0e1;' => '&#xf0e1', //LinkedIn
			'&#xf0d2;' => '&#xf0d2', //Pinterest
			'&#xf16d;' => '&#xf16d', //Instagram
			'&#xf16e;' => '&#xf16e', //Flickr
			'&#xf173;' => '&#xf173', //Tumblr
			'&#xf17d;' => '&#xf17d', //Dribbble
			'&#xf17e;' => '&#xf17e', //Skype
			'&#xf180;' => '&#xf180', //Foursquare
			'&#xf09e;' => '&#xf09e', //RSS
			'&#xf002;' => '&#xf002',
			'&#xf003;' => '&#xf003',
			'&#xf03d;' => '&#xf03d',
			'&#xf092;' => '&#xf092',
			'&#xf095;' => '&#xf095',
			'&#xf09b;' => '&#xf09b',
			'&#xf0c1;' => '&#xf0c1',
			'&#xf0c2;' => '&#xf0c2',
			'&#xf113;' => '&#xf113',
			'&#xf136;' => '&#xf136',
			'&#xf13b;' => '&#xf13b',
			'&#xf13c;' => '&#xf13c',
			'&#xf168;' => '&#xf168',
			'&#xf16a;' => '&#xf16a',
			'&#xf16b;' => '&#xf16b',
			'&#xf16c;' => '&#xf16c',
			'&#xf170;' => '&#xf170',
			'&#xf171;' => '&#xf171',
			'&#xf179;' => '&#xf179',
			'&#xf17a;' => '&#xf17a',
			'&#xf17b;' => '&#xf17b',
			'&#xf17c;' => '&#xf17c',
			'&#xf181;' => '&#xf181',
			'&#xf184;' => '&#xf184',
			'&#xf188;' => '&#xf188',
			'&#xf189;' => '&#xf189',
			'&#xf18a;' => '&#xf18a',
			'&#xf18b;' => '&#xf18b',
		);

		return apply_filters( 'cpotheme_metadata_icons_social', $cpotheme_data );
	}
}
