<!--
//****************************************************************************************
//*
//*		���α׷���	: HTML ������ Ver2.0.0.1 JS ����
//*		������		: �̿��� (Knhead , ū�Ӹ�)
//*		������		: 2003�� 10�� 13��
//*		����		: 
//*		
//*		Ư¡		: ���� Javascript�� ���� ������ ����
//*		���۱�		: ���۱��� �̿���(Knhead, ū�Ӹ�)�� ����.
//*					  �ҽ� ���� ���� �������� ����� �־�� ��.
//*					  ���� �״�� ���ô� ��� ��� ��� ����
//*
//*		����		: �� �ҽ��� ���� ���� �� ���� ����� �����ڰ� �ƴ� ����ڿ��� �ֽ��ϴ�.
//*		
//****************************************************************************************


	//**	��Ÿ�� ���
		var Style	=	'<style type="text/css">\n';
			Style	+=	'	textarea			{font-size: 9pt; font-family: ����, ����; font-style:  normal; font-weight: normal;}\n';
			Style	+=	'	.Editor_Tool		{border-collapse: collapse; background-color: buttonface; margin: 0; padding: 0;}\n';
			Style	+=	'	.Editor_Btn_Default	{cursor:hand; width: 23px; height: 22px; border: 1px solid buttonface;}\n';
			Style	+=	'	.Editor_Btn_Over	{cursor:hand; width: 23px; height: 22px; border: 1px outset;}\n';
			Style	+=	'	.Editor_Btn_Down	{cursor:hand; width: 23px; height: 22px; border: 1px inset; background-color: buttonhighlight;}\n';
			Style	+=	'	.Editor_Btn_Disable	{cursor:default; width: 23px; height: 22px; border: 1px solid buttonface; filter: alpha(opacity=20);}\n';
			Style	+=	'	.Editor_Btn2_Default{cursor:hand; border: 1px solid threedface;}\n';
			Style	+=	'	.Editor_Btn2_Over	{cursor:hand; border: 1px solid #0A246A; background-color: #B6BDD2;}\n';
			Style	+=	'	.Editor_Btn2_Check	{cursor:hand; border: 1px solid #0A246A; background-color: #D4D5D8;}\n';
			Style	+=	'	.Editor_Select		{cursor:hand; border: 1px solid #808080; font-size: 9pt;}\n';
			Style	+=	'	.Editor_Separator	{border: 1px inset; width: 1px; height: 22px; margin: 0 3 0 3}\n';
			Style	+=	'</style>'
		
		document.write(Style);



	/*-------------------------------------------------------------------
		��Ǹ�	: Editor_Defaule_Config
		������	: EditorObjName - ������ ��ü �̸�
		����	: ������ �⺻ ���� ��
	-------------------------------------------------------------------*/
	
		function Editor_Defaule_Config(EditorObjName){
		
			this.Version		=	'2.0.0.1'		//**	����
			this.Width			=	'auto'			//**	������ ��
			this.Height			=	'auto'			//**	������ ����
			this.BodyStyle		=	'font-size: 9pt; font-family: ����; background-color: #FFFFFF;'		//**	������ Body ��Ÿ��
			this.HeightSpace	=	0				//**	������ ��ư�� ����
			this.WidthSpace		=	0				//**	������ ��ư�� �ʺ�
			this.ImagePath		=	Editor_Root_Dir + '/images/'		//**	������ �׸� ���
			
			this.EditMod		=	0;				//**	���� ���� (0: Text, 1:Html, 2: Preview)
			this.Debug			=	0;				//**	����� �� ����
			this.ReplaceBR		=	0;				//**	�ٹٲ��� <BR> �� ǥ��
			
			this.StyleSheet		=	'';				//������ �ȿ� �� ��Ÿ�� ��Ʈ ����(Ǯ ���[�ּ� ����]�� ���� �ּ���)
			
			//**	�⺻ ��Ÿ�� ��Ʈ
			this.DefaultStyle	=	  '<style type="text/css">\n'
									+ '	body	{font-size: 10pt; font-family: ����, ����; font-style:  normal; font-weight: normal;}\n'
									+ '	p		{font-size: 10pt; font-family: ����, ����; font-style:  normal; font-weight: normal;}\n'
									+ '	td		{font-size: 10pt; font-family: ����, ����; font-style:  normal; font-weight: normal;}\n'
									+' p		{margin-top:2px;margin-bottom:2px;}\n'
									+ '</style>\n';
			
			//**	���� ����
			this.ToolBar		=	[
									//**	��Ʈ�̸�
										['FontName'],
									//**	��Ʈ ������
										['FontSize'],
									//**	�۸Ӹ� ��ȣ �� ��ȣ �ޱ��
										['separator', 'InsertOrderedList', 'InsertUnOrderedList', 'Outdent', 'Indent'],
									//**	����
										['separator', 'JustifyFull', 'JustifyLeft', 'JustifyCenter', 'JustifyRight'],

									//**	�߶󳻱�, ����, ���̱�
										['separator', 'Cut', 'Copy', 'Paste'],
									//**	���� ����
										['Bold', 'Italic', 'Underline', 'separator'],
									//**	���ڻ�, ���� ����
										['ForeColor', 'BackColor', 'separator'],
									//**	������, ��ũ, ��ũ �׸� ����, ���̺� ����, �÷��� ����
										['InsertHorizontalRule', 'CreateLink', 'InsertImage', 'InsertFlash', 'InsertMovie', 'InsertTable']

									]
			
			//**	��Ʈ �̸� ����
				this.FontNames	=	{
					//**				'ǥ�� �̸�'			:	'��Ʈ �̸�'
										'����ü'			:	'����ü',
										'����ü'			:	'����ü',
										'����ü'			:	'����ü',
										'�ü�ü'			:	'�ü�ü',
										'�޸ո���ü'		:	'�޸ո���ü',
										'�޸տ�ü'			:	'�޸տ�ü',
										'HY����L'			:	'HY����L',
										'HY��������M'		:	'HY��������M',
										'HY������M'		:	'HY������M',
										'Arial'				:	'arial, helvetica, sans-serif',
    									'Courier New'		:	'courier new, courier, mono',
									   'Georgia'			:	'Georgia, Times New Roman, Times, Serif',
									   'Tahoma'			:	'Tahoma, Arial, Helvetica, sans-serif',
									   'Times New'	:	'times new roman, times, serif',
									   'Verdana'			:	'Verdana, Arial, Helvetica, sans-serif',
									   'impact'			:	'impact',
									   'WingDings'			:	'WingDings'
									}
			
			//**	��Ʈ ũ��
				this.FontSize	=	{
					//**				'ǥ�� �̸�'			:	'��Ʈ ũ��'
										'1(8pt)'			:	'1',
										'2(10pt)'			:	'2',
										'3(12pt)'			:	'3',
										'4(14pt)'			:	'4',
										'5(18pt)'			:	'5',
										'6(24pt)'			:	'6',
										'7(36pt)'			:	'7'
									}
			
			//**	������ ��ư ����
				this.ButtonList	=	{
					//**				��ư �̸�				:	 ���̵�					����				Ŭ���� ����				�̹��� ���
										'insertorderedlist'		:	['InsertOrderedList',	'��ȣ�ޱ��',		'Editor_ACT(this.id)',		'icon_numberlist.gif'],
										'insertunorderedlist'	:	['InsertUnOrderedList',	'�۸Ӹ���ȣ',		'Editor_ACT(this.id)',		'icon_balllist.gif'],
										'outdent'				:	['Outdent',				'�����',			'Editor_ACT(this.id)',		'icon_outdent.gif'],
										'indent'				:	['Indent',				'�鿩����',			'Editor_ACT(this.id)',		'icon_indent.gif'],
										'justifyfull'			:	['JustifyFull',			'��������',			'Editor_ACT(this.id)',		'icon_full.gif'],
										'justifyleft'			:	['JustifyLeft',			'��������',			'Editor_ACT(this.id)',		'icon_left.gif'],
										'justifycenter'			:	['JustifyCenter',		'�������',		'Editor_ACT(this.id)',		'icon_center.gif'],
										'justifyright'			:	['JustifyRight',		'����������',		'Editor_ACT(this.id)',		'icon_right.gif'],
										'bold'					:	['Bold',				'����',				'Editor_ACT(this.id)',		'icon_b.gif'],
										'italic'				:	['Italic',				'����Ӳ�',			'Editor_ACT(this.id)',		'icon_i.gif'],
										'underline'				:	['Underline',			'����',				'Editor_ACT(this.id)',		'icon_u.gif'],
										'cut'					:	['Cut',					'�ڸ���',			'Editor_ACT(this.id)',		'icon_cut.gif'],
										'copy'					:	['Copy',				'�����ϱ�',			'Editor_ACT(this.id)',		'icon_copy.gif'],
										'paste'					:	['Paste',				'�ٿ��ֱ�',			'Editor_ACT(this.id)',		'icon_paste.gif'],
										'forecolor'				:	['ForeColor',			'���ڻ�',			'Editor_ACT(this.id)',		'icon_fontcolor.gif'],
										'backcolor'				:	['BackColor',			'����',				'Editor_ACT(this.id)',		'icon_backcolor.gif'],
										'inserthorizontalrule'	:	['InsertHorizontalRule','������',			'Editor_ACT(this.id)',		'icon_hr.gif'],
										'createlink'			:	['CreateLink',			'�����۸�ũ ����',	'Editor_ACT(this.id)',		'icon_link.gif'],
										'insertimage'			:	['InsertImage',			'�׸� ����',		'Editor_ACT(this.id)',		'icon_image.gif'],
										'inserttable'			:	['InsertTable',			'ǥ ����',			'Editor_ACT(this.id)',		'icon_table.gif'],
										'insertflash'			:	['InsertFlash',			'�÷��� ����',			'Editor_ACT(this.id)',		'icon_flash.gif'],
										'insertmovie'			:	['InsertMovie',			'������ ����',			'Editor_ACT(this.id)',		'icon_movie.gif'],										
										'version'				:	['Version',				'������ ���� ����',	'Editor_ACT(this.id)',		'icon_info.gif'],
										'help'					:	['Help',				'����',			'Editor_ACT(this.id)',		'icon_help.gif']
									}

		}


	/*-------------------------------------------------------------------
		��Ǹ�	: Editor_New_Generate
		������	: EditorObjName - ������ ��ü �̸�
				  CustomEditorConfigObj - ������ ���� ��ü
		����	: ������ �ʱ�ȭ
		����	: Editor_New_Generate('Teatarea �̸�', ����ڿ����ͼ�����ü��)
	-------------------------------------------------------------------*/
	
		function Editor_New_Generate(EditorObjName, CustomEditorConfigObj){
		
			//**	������ ������Ʈ ����
				var EditorObj	=	document.all[EditorObjName];
				
			//**	������ ���� ����
				var ConfigObj	= new Editor_Defaule_Config(EditorObjName);
			
			//**	����� ���ǰ� ������.. �⺻���� ������ ���� �����
				if(CustomEditorConfigObj){
					for( var ParameterName in CustomEditorConfigObj){
						if(CustomEditorConfigObj[ParameterName]){
							ConfigObj[ParameterName]	= CustomEditorConfigObj[ParameterName];
						}
					}
				}
				
			//**	������ ��ü�� ���� ž��
				EditorObj.Config	= ConfigObj;
			
			//**	������ �ʺ� ����
				//**	�������� �ʺ� ���� �Ǿ� ���� ���
				if(!ConfigObj.Width || ConfigObj.Width=='auto'){
					if(EditorObj.style.width)	{	ConfigObj.Width = EditorObj.style.width;	}		//**	��Ÿ�� ��Ʈ�� �ʺ� ���� �Ǿ� �������
					else if(EditorObj.cols)		{	ConfigObj.Width = (EditorObj.cols * 22) + 22;}		//**	Textarea�� col�� ������ŭ �ʺ� ����
					else						{	ConfigObj.Width = '100%';					}		//**	�ƹ����� ������ �ʺ�� 100%�� ����
				}
				
				//**	�������� ���̰� ���� �Ǿ� ���� ���
				if(!ConfigObj.Height || ConfigObj.Height =='auto'){
					if(EditorObj.style.height)	{	ConfigObj.Height = EditorObj.style.height;	}		//**	��Ÿ�� ��Ʈ�� ���� ���� �Ǿ� �������
					else if(EditorObj.rows)		{	ConfigObj.Height = EditorObj.rows * 17;		}		//**	Textarea�� row�� ������ŭ ���� ����
					else						{	ConfigObj.Height = '300';					}		//**	�ƹ����� ������ ���̴� 300���� ����
				}
			
			//**	��ü���� ������ ��� �����
				//**	��ư �ܰ� ���̺� HTML
					var HTML_Table_Open		=	'<table border="0" cellpadding="0" cellspacing="0" style="float: left;"><tr><td>';
					var HTML_Table_Close	=	'</td></tr></table>';
				
				//**	���� HTML
					var HTML_Toolbar		=	'';
					var btnGroup, btnParameter, btnName;
					var btnObjId, btnObjTitle, btnObjOnClickEvent, btnObjImgSrc
					
					for(btnGroup in ConfigObj.ToolBar){
						//**	�ٹٲ� ó��
							if(ConfigObj.ToolBar[btnGroup].length==1 && ConfigObj.ToolBar[btnGroup][0].toLowerCase()=='linebreak'){
								HTML_Toolbar	+=	'<br clear="all">';
								continue;
							}
						
						//**	������ ��ư �� ����â ó��
							//**	��ư �ܰ� ���̺� ����
								HTML_Toolbar	+=	HTML_Table_Open;
							
							for(btnParameter in ConfigObj.ToolBar[btnGroup]){
								btnName	=	ConfigObj.ToolBar[btnGroup][btnParameter].toLowerCase();		//**	��ư �̸�
								
								//**	��Ʈ��
								if(btnName	==	'fontname'){
									HTML_Toolbar	+=	'<select id="Editor__'+ EditorObjName +'__FontName" OnChange="Editor_ACT(this.id)" class="Editor_Select">\n';
									
									for(var FontName in ConfigObj.FontNames){
										HTML_Toolbar	+=	'<option value="'+ ConfigObj.FontNames[FontName] +'">'+ FontName +'</option>\n';
									}
									HTML_Toolbar	+=	'</select>';
									continue;
								}
								
								//**	��Ʈ ũ��
								if(btnName	==	'fontsize'){
									HTML_Toolbar	+=	'<select id="Editor__'+ EditorObjName +'__FontSize" OnChange="Editor_ACT(this.id)" class="Editor_Select">';
									
									for(var FontSize in ConfigObj.FontSize){
										HTML_Toolbar	+=	'<option value="'+ ConfigObj.FontSize[FontSize] +'">'+ FontSize +'</option>';
									}
									HTML_Toolbar	+=	'</select>';
									continue;
								}
								
								//**	������
								if(btnName	==	'separator'){
									HTML_Toolbar	+=	'<span class="Editor_Separator"></span>'
									continue;
								}
								
								//**	��ư��
								var btnObj	=	ConfigObj.ButtonList[btnName];
								
									//**	��ư�ȿ� �ٹٲ� ���� ���� �޼���
									if(btnName	==	'linebreak'){
										alert('HTML���� �����Դϴ�.\n\n+ ���� ���� +\n\t��ư �ٹٲ޿ɼ�[LineBreak]�� .ToolBar������ �߰� �Ҽ� �ֽ��ϴ�.\n\t�ҽ��� ���� ���ֽñ� �ٶ��ϴ�.\n\nHTML ���� ������ ���� ����.');
										return false;
									}
									
									//**	����Ʈ�� ���� ��ư ���� ���� �޼���
									if(!btnObj){
										alert('HTML���� �����Դϴ�.\n\n+ ���� ���� +\n\t'+ EditorObjName +'�� ��ư '+ btnName +'������ �����ϴ�.\n\t�ҽ��� ���� ���ֽñ� �ٶ��ϴ�.\n\nHTML ���� ������ ���� ����.');
										return false;
									}
									
									//**	��ư �����
										btnObjId			=	btnObj[0];
										btnObjTitle			=	btnObj[1];
										btnObjOnClickEvent	=	btnObj[2];
										btnObjImgSrc		=	btnObj[3];
								
										HTML_Toolbar	+=	'<button id="Editor__'+ EditorObjName +'__'+ btnObjId +'" title="'+ btnObjTitle +'" class="Editor_Btn_Default" OnClick="javascript:'+ btnObjOnClickEvent +'" OnMouseOver="javascript:if(this.className==\'Editor_Btn_Default\'){this.className=\'Editor_Btn_Over\';}" OnMouseOut="javascript:if(this.className==\'Editor_Btn_Over\'){this.className=\'Editor_Btn_Default\';}" unselectable="on"> <img src="'+ ConfigObj.ImagePath + btnObjImgSrc +'" border="0"></button>';
									
							}
							
							//**	��ư �ܰ� ���̺� �ݱ�
								HTML_Toolbar	+=	HTML_Table_Close;
					}
				
				
				
				//**	��ü HTML ������ ��� �����
					var HTML_Editor	=	'';
					
						HTML_Editor	+=	'<table  class="Editor_Tool" border="1" cellpadding="1" cellspacing="0" width="'+ ConfigObj.Width+'" height="'+ ConfigObj.Height +'" style="border-collapse: collapse;"><tr><td>';
						HTML_Editor	+=	'<span id="Editor_ToolBar"><table class="Editor_Tool" border="0" cellpadding="0" cellspacing="0" width="'+ ConfigObj.Width +'" style="border-collapse: collapse;"><tr><td style=" padding-top:5; padding-left:2; padding-bottom:2;">';
						HTML_Editor	+=	HTML_Toolbar;
						HTML_Editor	+=	'</td></tr></table></span>';
						HTML_Editor	+=	'</td></tr><tr><td>';
						HTML_Editor	+=	'<textarea id="Editor__'+ EditorObjName +'__EditorPad" style="width:'+ ConfigObj.Width +'; height:'+ ConfigObj.Height +'; "></textarea>';
						HTML_Editor	+=	'</td></tr><tr><td style="height:20; padding-left:5;">';
						HTML_Editor	+=	'	<table border="0" cellpadding="0" cellspacing="0" width="100%"><tr><td width="50%">';
						HTML_Editor	+=	'		<img id="Editor__'+ EditorObjName +'__HTMLEdit" class="Editor_Btn2_Default" src="'+ ConfigObj.ImagePath +'icon_edit.gif" OnClick="javascript:Editor_ACT(this.id)" OnMouseOver="javascript:if(this.className==\'Editor_Btn2_Default\'){this.className=\'Editor_Btn2_Over\';}" OnMouseOut="javascript:if(this.className==\'Editor_Btn2_Over\'){this.className=\'Editor_Btn2_Default\';}">';
						HTML_Editor	+=	'		<img id="Editor__'+ EditorObjName +'__HTMLSource" class="Editor_Btn2_Default" src="'+ ConfigObj.ImagePath +'icon_html.gif" OnClick="javascript:Editor_ACT(this.id)" OnMouseOver="javascript:if(this.className==\'Editor_Btn2_Default\'){this.className=\'Editor_Btn2_Over\';}" OnMouseOut="javascript:if(this.className==\'Editor_Btn2_Over\'){this.className=\'Editor_Btn2_Default\';}">';
						HTML_Editor	+=	'		<img id="Editor__'+ EditorObjName +'__HTMLPreview" class="Editor_Btn2_Default" src="'+ ConfigObj.ImagePath +'icon_preview.gif" OnClick="javascript:Editor_ACT(this.id)" OnMouseOver="javascript:if(this.className==\'Editor_Btn2_Default\'){this.className=\'Editor_Btn2_Over\';}" OnMouseOut="javascript:if(this.className==\'Editor_Btn2_Over\'){this.className=\'Editor_Btn2_Default\';}">';
						HTML_Editor	+=	'	</td><td width="50%" align="right" style="padding-right:10; cursor:default;">';
						HTML_Editor	+=	'	</td></tr></table>';
						HTML_Editor	+=	'</td></tr></table>';
				
			//**	������ ������ HTML �ҽ� �����ϱ�
				document.all[EditorObjName].insertAdjacentHTML('afterEnd', HTML_Editor);
			
			//**	HTML ��ȯ�� �� �������� ������ Textare �����
				if(!ConfigObj.Debug){
					document.all[EditorObjName].style.display	=	'none';
				}
				
				if(ConfigObj.ReplaceBR){
					var Content	=	EditorObj.value;
						Content = Content.replace(/\r\n/g, '<br>');
						Content = Content.replace(/\n/g, '<br>');
						Content = Content.replace(/\r/g, '<br>');
					EditorObj.value	=	Content
				}
				
			//**	HTML �����ͷ� ��ȭ ��Ű��
				Editor_Change_Mode(EditorObjName, 1);
				
		}








	/*-------------------------------------------------------------------
		��Ǹ�	: Editor_Change_Mode
		������	: ObjName - ������ ��ü �̸�
				  ChangeMode	- ������ �ϴ� ���(0:Text, 1;Html, 2:Preview)
		����	: �������� ���� ��� ��ȭ
		����	: Editor_Change_Mode(��ü�̸�, ������ ���)
	-------------------------------------------------------------------*/

		function Editor_Change_Mode(ObjName, ChangeMode){
			var ConfigObj		=	document.all[ObjName].Config;
			var ContentObj		=	document.all[ObjName];
			var EditorObj		=	document.all['Editor__'+ ObjName +'__EditorPad'];
			
			//**	������ �ε��� �� �������� ó���� ����...ó�� �Ѥ�;
				if(document.readyState != 'complete'){
					setTimeout(function(){	Editor_Change_Mode(ObjName, ChangeMode);	}, 25);
					return false;
				}
			
			//**	ó�� ��忡 ���� ����Ʈ â��
				var TextEditor		=	'<textarea id="Editor__'+ ObjName +'__EditorPad" style="width:'+ EditorObj.style.width +'; height:'+ EditorObj.style.height +';" rows="1" cols="20"></textarea>';
				var HtmlEditor		=	'<iframe id="Editor__'+ ObjName +'__EditorPad" style="width:'+ EditorObj.style.width +'; height:'+ EditorObj.style.height +';"></iframe>';
				var PreviewEditor	=	'<iframe id="Editor__'+ ObjName +'__EditorPad" style="width:'+ EditorObj.style.width +'; height:'+ EditorObj.style.height +';"></iframe>';
			
			//**	ó�� ���
				
				//**	Text ���� ��ȭ
					var Now_EditMode	=	ConfigObj.EditMod;
					
					if(ChangeMode==0 && Now_EditMode!=0){
						//**	���� �ٲ�]
							ConfigObj.EditMod	=	0;
						
						//**	������ â �ٲ� ����
							var Content			=	ContentObj.value;
							EditorObj.outerHTML	=	TextEditor;
							EditorObj			=	document.all['Editor__'+ ObjName +'__EditorPad'];
							EditorObj.value		=	Content
						
						//**	���� ��ư ��ȭ
							document.all['Editor__'+ ObjName +'__HTMLEdit'].className		='Editor_Btn2_Default';
							document.all['Editor__'+ ObjName +'__HTMLSource'].className		='Editor_Btn2_Check';
							document.all['Editor__'+ ObjName +'__HTMLPreview'].className	='Editor_Btn2_Default';
						
						//**	��ư ��Ȱ��ȭ
							Editor_UpdatToolbar(ObjName, 'disable');
							
						
						//**	HTML �������� �̺�Ʈ ��鷯 ����
							EditorObj.onkeydown		=	function()	{	Editor_Event_Handlers(ObjName);	}
							EditorObj.onkeypress	=	function()	{	Editor_Event_Handlers(ObjName);	}
							EditorObj.onkeyup		=	function()	{	Editor_Event_Handlers(ObjName);	}
							EditorObj.onmouseup		=	function()	{	Editor_Event_Handlers(ObjName);	}
							EditorObj.onblur		=	function()	{	Editor_Event_Handlers(ObjName, -1);	}
							EditorObj.oncut			=	function()	{	Editor_Event_Handlers(ObjName, 100);	}
							EditorObj.ondrop		=	function()	{	Editor_Event_Handlers(ObjName, 100);	}
							EditorObj.onpaste		=	function()	{	Editor_Event_Handlers(ObjName, 100);	}
						
						//**	��Ŀ�� �̵�
							//Editor_Focus(EditorObj);
							
					}else if(ChangeMode==1 && Now_EditMode!=1){
						//**	���� �ٲ�]
							ConfigObj.EditMod	=	1;
						//**	���� ���� ����
							var Content	=	ContentObj.value;
							
							//**	������ â �ٲ�
								EditorObj.outerHTML	=	HtmlEditor;
							
							//**	������ ������Ʈ �缳��
								EditorObj	=	document.all['Editor__'+ ObjName +'__EditorPad'];
							
							//**	������ �ȿ� �� �ҽ� ����
								var EditorPad_Source	=	'';
								EditorPad_Source +=	'<html><head>\n';
								
								//**	��Ÿ�� ��Ʈ ����
									if(ConfigObj.StyleSheet!=''){
										EditorPad_Source +=	'<link href="'+ ConfigObj.StyleSheet +'" rel="stylesheet" type="text/css">\n';
									}
									
								//**	�⺻ ��Ÿ�� ����
									if(ConfigObj.DefaultStyle!=''){
										EditorPad_Source +=	ConfigObj.DefaultStyle;
									}
								
								//**	Body ����
									EditorPad_Source +=	'<body contenteditable="true" topmargin="1" leftmargin="1">\n';
								//**	���� ����
									EditorPad_Source +=	Content;
								//**	���� �ݱ�
									EditorPad_Source +=	'</body>\n</html>\n';
							
							//**	HTML ����
								var EditorDoc	=	EditorObj.contentWindow.document;
									EditorDoc.open();
									EditorDoc.write(EditorPad_Source);
									EditorDoc.close();
								
							//**	��ü �ٽ� ����
								EditorDoc.ObjName = ObjName;
							
							//**	��ư ��Ȱ��ȭ
								Editor_UpdatToolbar(ObjName, 'enable');
							
							//**	HTML �������� �̺�Ʈ ��鷯 ����
								EditorDoc.onkeydown		=	function()	{	Editor_Event_Handlers(ObjName);	}
								EditorDoc.onkeypress	=	function()	{	Editor_Event_Handlers(ObjName);	}
								EditorDoc.onkeyup		=	function()	{	Editor_Event_Handlers(ObjName);	}
								EditorDoc.onmouseup		=	function()	{	Editor_Event_Handlers(ObjName);	}
								EditorDoc.body.onblur	=	function()	{	Editor_Event_Handlers(ObjName, -1);	}
								EditorDoc.body.oncut	=	function()	{	Editor_Event_Handlers(ObjName, 100);	}
								EditorDoc.body.ondrop	=	function()	{	Editor_Event_Handlers(ObjName, 100);	}
								EditorDoc.body.onpaste	=	function()	{	Editor_Event_Handlers(ObjName, 100);	}
								
							//**	��Ŀ�� �̵�
								//Editor_Focus(EditorObj);
						
						//**	���� ��ư ��ȭ
							document.all['Editor__'+ ObjName +'__HTMLEdit'].className		='Editor_Btn2_Check';
							document.all['Editor__'+ ObjName +'__HTMLSource'].className		='Editor_Btn2_Default';
							document.all['Editor__'+ ObjName +'__HTMLPreview'].className	='Editor_Btn2_Default';
							
					}else if(ChangeMode==2 && Now_EditMode!=2){
						//**	���� �ٲ�]
							ConfigObj.EditMod	=	2;
						
						//**	â �ٲ�
							var PreContent		=	'<html><head>\n'
							var Content			=	ContentObj.value;
							
							//**	��Ÿ�� ��Ʈ ����
								if(ConfigObj.StyleSheet!=''){
									PreContent +=	'<link href="'+ ConfigObj.StyleSheet +'" rel="stylesheet" type="text/css">\n';
									}
							//**	�⺻ ��Ÿ�� ����
								if(ConfigObj.DefaultStyle!=''){
									PreContent +=	ConfigObj.DefaultStyle;
								}
								
								PreContent	+= '<body contenteditable="false" topmargin="1" leftmargin="1">\n';
								
								Content = PreContent + Content + '</body>\n</html>\n';
							
							Editor_GetHTML(ObjName);
							EditorObj.outerHTML	=	PreviewEditor;
							EditorObj			=	document.all['Editor__'+ ObjName +'__EditorPad'];
							var EditorDoc = EditorObj.contentWindow.document;
								EditorDoc.open();
								EditorDoc.write(Content);
								EditorDoc.close();
							
							EditorDoc.designMode = 'Off';
						
						//**	���� ��ư ��ȭ
							document.all['Editor__'+ ObjName +'__HTMLEdit'].className		='Editor_Btn2_Default';
							document.all['Editor__'+ ObjName +'__HTMLSource'].className		='Editor_Btn2_Default';
							document.all['Editor__'+ ObjName +'__HTMLPreview'].className	='Editor_Btn2_Check';
							
						//**	��ư ��Ȱ��ȭ
							Editor_UpdatToolbar(ObjName, 'disable');
					}
						
		}


	/*-------------------------------------------------------------------
		��Ǹ�	: Editor_Focus
		������	: EditorObj		- ������ ��ü
		����	: �ش� ��ü�� ��Ŀ���� �̵�
	-------------------------------------------------------------------*/
		function Editor_Focus(EditorObj){
			
			//**	������ ��� üũ
				//**	Textarea �ϰ��
					if(EditorObj.tagName.toLowerCase() == 'textarea'){
						setTimeout(function(){	EditorObj.focus();	}, 150);								//**	�ణ�� �����̸� �༭ ��Ŀ�� �̵�
				
				//**	���� ������ ��� �ϰ��
					}else{
						var EditorDoc			=	EditorObj.contentWindow.document;	//**	���� �������� ���� ��ü
						var EditorRange			=	EditorDoc.body.createTextRange();		//**	������ Range
						var EditorCursorRange	=	EditorDoc.selection.createRange();		//**	���� Range
						
						//**	���� ������ ���� ���� ������ ������ ������ ������.. Ŀ���� ó��, Ŀ���� �ִ� ��ġ�� �̵�
							if(EditorCursorRange.length	== null && !EditorRange.inRange(EditorCursorRange)){
								EditorRange.collapse();
								EditorRange.select();
							
								EditorCursorRange	=	EditorRange;
							}
					}
		}



	/*-------------------------------------------------------------------
		��Ǹ�	: Editor_Event_Handlers
		������	: ObjName	- ������ ��ü �̸�
				  RunDelay	- �ð� ����, -1�� �ٷ� ����
				  EventName	- �̺�Ʈ �̸�
		����	: ������ �̺�Ʈ ��
		����	: Editor_Event_Handlers(��ü�̸�, [�����ð�], [�̺�Ʈ �̸�])
	-------------------------------------------------------------------*/
	
		function Editor_Event_Handlers(ObjName, RunDelay, EventName){			
			var Config		=	document.all[ObjName].Config;						//**	���� Textarea�� ���� �ҷ�����
			var EditorObj	=	document.all['Editor__'+ ObjName +'__EditorPad'];		//**	HTML ������ ��ü �ҷ�����
			
			//**	RunDelay�� ���� �������� 0�� �ڵ� ����
				if(RunDelay == null){	RunDelay=0;	}
			
			var EditorDoc	=	'';
			var EditorEvent	=	EditorObj.contentWindow;
				if(EditorEvent){
					EditorEvent	=	EditorObj.contentWindow.event;
				}else{
					EditorEvent	=	event;
				}
			
			//**	KeyPress �̺�Ʈ
				if(EditorEvent && EditorEvent.keyCode){
					var keyCode		=	EditorEvent.keyCode;
					var ctrlKey		=	EditorEvent.ctrlKey;
					var altKey		=	EditorEvent.altKey;
					var shiftKey	=	EditorEvent.shiftKey;
					
					if(keyCode==16){return}		//**	����ƮŰ ���
					if(keyCode==17){return}		//**	��Ʈ��Ű ���
					if(keyCode==18){return}		//**	��ƮŰ ���
					
					//**	����Ű�� <p></p>�� �ƴ� <br>�� ��ü
					if(keyCode==13 && EditorEvent.type == 'keypress' && Config.ReplaceBR!=0){
						EditorEvent.returnValue	=	false;
						Editor_InsertHTML(ObjName, "<br>");
					}
					
					//**	Undo ó�� (ctrl+z)
					if(ctrlKey && (keyCode==122 || keyCode==90)){
						EditorEvent.cancelBubble	=	true;
						return;
					}
					//**	Redo ó��(ctrl-y, ctrl-shift-z)
					if((ctrlKey && (keyCode==121 || keyCode==89)) || (ctrlKey && shiftKey && (keyCode==122 || keyCode==90))){
						return;
					}
				}
			
			//**	�̺�Ʈ�� ������ �ð��� �������
				if(RunDelay > 0){
					return setTimeout(function(){	Editor_Event_Handlers(ObjName);	}, RunDelay);
				}
				
			//**	���� ������ �� �ʿ��� ���
				if(this.tooSoon==1 && RunDelay >= 0){
					this.queue=1;
					return;
				}
				
				this.tooSoon = 1;
				setTimeout(function(){
										this.tooSoon	= 0;
										if(this.queue){
											Editor_Event_Handlers(ObjName, -1);
										}
										this.queue		= 0;
									}, 333);
			
			//**	���� Textarea�ȿ� ���� ����
				Editor_UpdateOutput(ObjName);
				
			//**	Ŀ���� �ִ� ��ġ�� �ۿ� ����Ǵ� ��ư�� Ȱ��ȭ
				Editor_UpdatToolbar(ObjName);
		}
		

	/*-------------------------------------------------------------------
		��Ǹ�	: Editor_UpdateOutput
		������	: ObjName		- ������ ��ü �̸�
		����	: �����ִ� ������ Textarea�� ������ ����
	-------------------------------------------------------------------*/
			
		function Editor_UpdateOutput(ObjName){
			var Config		=	document.all[ObjName].Config;							//**	���� Textarea�� ���� �ҷ�����
			var EditorObj	=	document.all['Editor__'+ ObjName +'__EditorPad'];			//**	HTML ������ ��ü �ҷ�����
			
			var isTextarea	=	(EditorObj.tagName.toLowerCase()=='textarea');			//**	����Ʈ â�� Textarea ���� �˻�
			var EditorDoc	= 	isTextarea ? null : EditorObj.contentWindow.document;
			
			//**	����������â���� ������ �������
				var Content	=	'';
				
				if(isTextarea){
					Content	=	EditorObj.value;
				}else{
					Content	=	EditorDoc.body.innerHTML;
				}
			
			//**	������ ���� �Ǿ����� ���� �˻�
				if(Config.lastUpdateOutput && Config.lastUpdateOutput == Content){
					return;
				}else{
					Config.lastUpdateOutput	=	Content;
				}
			
			//**	���� Textarea�� ���� ����
				document.all[ObjName].value	=	Content;
		}
		
	/*-------------------------------------------------------------------
		��Ǹ�	: Editor_InsertHTML
		������	: ObjName		- ������ ��ü �̸�
				  str1			- ���� ����
				  str2			- ���Թ���
				  bitSelection	- �̺�Ʈ �̸�
		����	: �ش� str�� ����
	-------------------------------------------------------------------*/
		function Editor_InsertHTML(ObjName, str1, str2, bitSel){
			
			var Config		=	document.all[ObjName].Config;						//**	���� Textarea�� ���� �ҷ�����
			var EditorObj	=	document.all['Editor__'+ ObjName +'__EditorPad'];		//**	HTML ������ ��ü �ҷ�����
			
			if(str1==null){str1='';}
			if(str2==null){str2='';}
			
			//**	�⺻ Textarea ����Ʈ ����� ���
				var DefaultObj	=	document.all[ObjName];
				
				if(DefaultObj && EditorObj == null){
					DefaultObj.focus();
					DefaultObj.value	=	DefaultObj.value + str1 + str2;
					return;
				}
			
			//**	������ â ���� üũ
				if(EditorObj == null){
					alert('�ش� ���ڸ� ���� �Ҽ��� �����ϴ�.\n\n '+ ObjName +'�� �̸��� ���� ��ü�� ã���� �����ϴ�.');
					return;
				}
			
			//**	��Ŀ�� �̵�
				Editor_Focus(EditorObj);
			
			var EditorTagName	=	EditorObj.tagName.toLowerCase();
			var EditorSelectRange;
			
			//**	���� ����Ʈ ����� ���
				if(EditorTagName == 'iframe'){
					var EditorDoc		=	EditorObj.contentWindow.document;
					EditorSelectRange	=	EditorDoc.selection.createRange();
					
					var EditorSelectRangeHtml	=	EditorSelectRange.htmlText;
					
					//**	��ġ ���� ������� ��� �޼���
						if(EditorSelectRange.length){
							alert('�ش� ���ڸ� �����Ҽ��� �����ϴ�.\n���� ��ġ�� ������ �ֽñ� �ٶ��ϴ�.');
							return;
						}
					
					//**	��ġ ���� ������� �ش� ���� ����
						var OldHandler	=	window.onerror;
						window.onerror	=	function(){
														alert('�ش� ���ڸ� �����Ҽ��� �����ϴ�.');
														return;
													}
						if(EditorSelectRangeHtml.length){
							if(str2){
								EditorSelectRange.pasteHTML(str1 + EditorSelectRangeHtml + str2);
							}else{
								EditorSelectRange.pasteHTML(str1);
							}
						}else{
							if(bitSel){
								alert('�ش� ���ڸ� �����Ҽ��� �����ϴ�.\n���� ���ڸ� ������ �ֽñ� �ٶ��ϴ�.');
								return;
							}
							
							EditorSelectRange.pasteHTML(str1 + str2);
						}
						
						window.onerror	=	OldHandler;
						
			//**	�ؽ�Ʈ ��� �ϰ��
				}else if(EditorTagName == 'textarea'){
					EditorObj.focus();
					
					EditorSelectObj	=	document.selection.createRange();
					
					var EditorSelectRangeHtml	=	EditorSelectObj.text;
					
					//**	���� ����
						if(EditorSelectRangeHtml.length){
							if(str2){
								EditorSelectRange.text	=	str1 + EditorSelectRangeHtml + str2;
							}else{
								EditorSelectRange.text	=	str1;
							}
						}else{
							if(bitSel){
								alert('���ڸ� �����Ҽ� �����ϴ�.\n���� ���ڸ� ������ �ֽñ� �ٶ��ϴ�.');
							}
							
							EditorSelectRange.text	= str1 + str2;
						}
				}else{
					alert('���ڸ� �����Ҽ��� �����ϴ�.\n'+ EditorTagName +'�� ������ â�� �����ϴ�.');
				}
				
				//**	���ο� �Է� ������ �̵�
					EditorSelectRange.collapse(false);		//**	���� ������ ������ �̵�
					EditorSelectRange.select();				//**	���� ����
		}


	/*-------------------------------------------------------------------
		��Ǹ�	: Editor_GetHTML
		������	: ObjName		- ������ ��ü �̸�
		����	: �ش� �������� �ҽ��� ����
	-------------------------------------------------------------------*/
		function Editor_GetHTML(ObjName){
			var EditorObj	=	document.all['Editor__'+ ObjName +'__EditorPad'];		//**	HTML ������ ��ü �ҷ�����
			var isTextarea	=	(EditorObj.tagName.toLowerCase() == 'textarea');
			
			if(isTextarea){
				return EditorObj.value;
			}else{
				return EditorObj.contentWindow.document.body.innerHTML;
			}
		
		}



	/*-------------------------------------------------------------------
		��Ǹ�	: Editor_AppendHTML
		������	: ObjName		- ������ ��ü �̸�
				  Html			- �߰� �ҽ�
		����	: �ش� �������� �ҽ��� �߰�
	-------------------------------------------------------------------*/
		function Editor_AppendHTML(ObjName, Html){
			var EditorObj	=	document.all['Editor__'+ ObjName +'__EditorPad'];		//**	HTML ������ ��ü �ҷ�����
			var isTextarea	=	(EditorObj.tagName.toLowerCase() == 'textarea');
			
			if(isTextarea){
				EditorObj.value += Html;
			}else{
				EditorObj.contentWindow.document.body.innerHTML += Html;
			}
		
		}


	/*-------------------------------------------------------------------
		��Ǹ�	: Editor_Detect_RGB
		������	: Value		- �����̸�
		����	: �ش� ���ڸ� 16������ ��ȭ
	-------------------------------------------------------------------*/
		function Editor_Detect_RGB(Value){
			var strHex = '';
			
			//�ش� ������ 8���� ���ϱ�
			var strHexByte, tmpStr1, tmpStr2;
			
			for(var HexNum = 0; HexNum < 3; HexNum++){
				strHexByte	=	Value & 0xFF;
				Value >>= 8;
				tmpStr2	= strHexByte & 0x0F;
				tmpStr1	= (strHexByte >> 4) & 0x0F;
				
				strHex	+=	tmpStr1.toString(16);
				strHex	+=	tmpStr2.toString(16);
			}
			
			return strHex.toUpperCase();
		}


	/*-------------------------------------------------------------------
		��Ǹ�	: Editor_UpdatToolbar
		������	: ObjName		- ��ü �̸�
				  State			- ����
		����	: �ش� ���ڸ� 16������ ��ȭ
	-------------------------------------------------------------------*/
		function Editor_UpdatToolbar(ObjName, State){
			var EditorObj	=	document.all['Editor__'+ ObjName +'__EditorPad'];
			var Config		=	document.all[ObjName].Config;
			
			//**	��ư�� Ȱ�� ��Ȱ��
			if(State == 'enable' || State =='disable'){
				//**	��Ӵٿ� �޴� ��ư ����
					var ToolBarItems	=	new Array('FontName', 'FontSize', 'FontStyle');
				
				//**	��ư ��Ͽ��� ��ư �߰�
					for(var btnName in Config.ButtonList){
						ToolBarItems.push(Config.ButtonList[btnName][0]);
					}
				
				for(var idxBtn in ToolBarItems){
					var CmdId		=	ToolBarItems[idxBtn].toLowerCase();
					var ToolBarObj	=	document.all['Editor__'+ ObjName +'__'+ ToolBarItems[idxBtn]];
					
					//**	����Ʈâ ��ȭ, ����, ���� ��ư�� ��Ȱ��ȭ
						if(CmdId == 'htmledit' || CmdId == 'htmlsource' || CmdId == 'htmlpreview' || CmdId == 'version' || CmdId == 'help'){
							continue;
						}
					
					if(ToolBarObj == null){
						continue;
					}
					
					var isButton	=	(ToolBarObj.tagName.toLowerCase() == 'button') ? true : false;
					
					if(State == 'enable'){
						ToolBarObj.disabled	= false;
						if(isButton){
							ToolBarObj.className	= 'Editor_Btn_Default';
						}
					}
					
					if(State == 'disable'){
						ToolBarObj.disabled	= true;
						if(isButton){
							ToolBarObj.className	= 'Editor_Btn_Disable';
						}
					}
				}
				
				return;
			}
			
			
			//**	��ư ����
				
				//**	�ؽ�Ʈ ��� �ϰ�� ���� ����
					if(EditorObj.tagName.toLowerCase() == 'textarea'){
						return;
					}
			
			var EditorDoc	=	EditorObj.contentWindow.document;
			
			//**	��Ʈ�� ����
				var FontNameObj	=	document.all['Editor__'+ ObjName +'__FontName'];
				
				if(FontNameObj){
					var FontName	=	EditorDoc.queryCommandValue('FontName');
					if(FontName == null){
						FontNameObj.value	= null;
					}else{
						var FoundFont	= 0;
						
						for(i=0; i<FontNameObj.length; i++){
							if(FontName.toLowerCase() == FontNameObj[i].text.toLowerCase()){
								FontNameObj.selectedIndex	= i;
								FoundFont	= 1;
							}
						}
						
						//**	��Ʈ�� ��ã�� ���
						if(FoundFont != 1){
							FontNameObj.value	= null;
							FontNameObj.selectedIndex	= 0;
						}
					}
				}
			
			//**	��Ʈ ũ�� ����
				var FontSizeObj	=	document.all['Editor__'+ ObjName +'__FontSize'];
				
				if(FontSizeObj){
					var FontSize	= EditorDoc.queryCommandValue('FontSize');
					if(FontSize == null){
						FontSizeObj.value	= null;
					}else{
						var FoundFont	= 0;
						
						for(i=0; i<FontSizeObj.length; i++){
							if(FontSize == FontSizeObj[i].value){
								FontSizeObj.selectedIndex	= i;
								FoundFont	= 1;
							}
						}
						
						//**	��Ʈũ�⸦ ��ã���� ���
						if(FoundFont != 1){
							FontSizeObj.value			= null;
							FontSizeObj.selectedIndex	= 1;
						}
					}
				}
			
			//**	��Ʈ ��Ÿ�� ����
				var classNameObj	= document.all['Editor__'+ ObjName +'__FontStyle'];
				
				if(classNameObj){
					var CusorRange	= EditorObj.selection.createRange();
					
					//**	Ŭ���� �̸� �˻�
						var ParentElement
						
						if(CusorRange.length){
							ParentElement	= CursorRange[0];				//**	���� �ױ�
						}else{
							ParentElement	= CursorRange.parentElement();	//**	���� ����
						}
						
						while(ParentElement && !ParentElement.className){
							ParentElement	= ParentElement.parentElement;	
						}
						
						var thisClassName	= ParentElement ? ParentElement.classNametoLowerCase() : '';
						
						if(!thisClassName && classNameObj.value){
							classNameObj.value	= '';
						}else{
							var FoundClass	= 0;
							
							for(i=0; i<classNameObj.length; i++){
								if(thisClass == classNameObj[i].value.toLowerCase()){
									classNameObj.selectedIndex	= 1;
									FoundClass	= 1;
								}
							}
							
							//**	Ŭ�����̸��� ��ã�������
								if(FoundClass != 1){
									classNameObj.value	= null;
								}
						}
				}
			
			
			//**	�ٸ� ��ư�� ����
			
				var BtnIdList	= Array('Bold', 'Italic', 'Underline', 'JustifyFull', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'InsertOrderedList', 'InsertUnOrderedList');
				
				for(i=0; i<BtnIdList.length; i++){
					var BtnObj	= document.all['Editor__'+ ObjName +'__'+ BtnIdList[i]];
					
					if(BtnObj == null){
						continue;
					}
					
					var CmdActive	= EditorDoc.queryCommandState(BtnIdList[i]);
					
					//**	�ɼ� Ȱ��ȭ
						if(!CmdActive){
							if(BtnObj.className != 'Editor_Btn_Default'){
								BtnObj.className	= 'Editor_Btn_Default';
							}
							if(BtnObj.disableed != false){
								BtnObj.disabled	= false;
							}
					
					//** �ɼ� ��Ȱ��ȭ
						}else if(CmdActive){
							if(BtnObj.className != 'Editor_Btn_Down'){
								BtnObj.className	= 'Editor_Btn_Down';
							}
							if(BtnObj.disableed != false){
								BtnObj.disabled	= false;
							}
						}
				}
		}
//************************************************************************************************************************************************************************************
//************************************************************************************************************************************************************************************
//**
//**	������ ��ư �̺�Ʈ
//**
//************************************************************************************************************************************************************************************
//************************************************************************************************************************************************************************************

		function Editor_ACT(ButtonId){
			
			var Array_ObjName	=	ButtonId.split('__');
			
			var thisState		=	Array_ObjName[0];
			var thisObjName		=	Array_ObjName[1];
			var thisActId		=	Array_ObjName[2];
			
			var ButtonObj	=	document.all[ButtonId];
			var EditorObj	=	document.all['Editor__'+ thisObjName +'__EditorPad'];
			var Config		=	document.all[thisObjName].Config;
			
			
			//**	������ �ٲٱ� ��ư
				//**	���� ������
					if(thisActId == 'HTMLEdit'){
						Editor_Change_Mode(thisObjName, 1);
						return;
						
				//**	�ҽ� ������
					}else if(thisActId == 'HTMLSource'){
						Editor_Change_Mode(thisObjName, 0);
						return;
						
				//**	�̸�����
					}else if(thisActId == 'HTMLPreview'){
						Editor_Change_Mode(thisObjName, 2);
						return;
					}
			
			//**	�˾�â ��ư ó��( ����, ����)
			
				//**	����
					if(thisActId == 'Version'){
						showModalDialog(Editor_Root_Dir + 'PopupWin/Editor_Version.htm', 'EditorVersion', 'resizable: no; help: no; status: no; scroll: no;');
						return;
					}
				
				//**	����
					if(thisActId == 'Help'){
						showModalDialog(Editor_Root_Dir + 'PopupWin/Editor_Help.htm', 'EditorVersion', 'resizable: no; help: no; status: no; scroll: yes;');
						return;
					}
			
			//**	�ؽ�Ʈ ����ϰ�� ���� ���
				if(EditorObj.tagName.toLowerCase()=='textarea'){
					return;
				}
			
			//**	��ư ���� ����
				var EditorDoc	=	EditorObj.contentWindow.document;
				
				Editor_Focus(EditorObj);
				
				//**	��Ӵٿ� �޴� ��ư�� �ε��� �� �� ������ ����
					var ButtonIndex	=	ButtonObj.selectedIndex;
					var ButtonValue	=	(ButtonIndex != null) ? ButtonObj[ButtonIndex].value : null;
				
						if(false){
						
					//**	��Ʈ �̸�
						}else if(thisActId == 'FontName' && ButtonValue){
							EditorDoc.execCommand(thisActId, 0, ButtonValue);
					
					//**	��Ʈ ũ��
						}else if(thisActId == 'FontSize' && ButtonValue){
							EditorDoc.execCommand(thisActId, 0, ButtonValue);
					
					//**	��Ʈ ��Ÿ��(��Ÿ�� ��Ʈ�� Ŭ�����̸����� ��ȯ)
						}else if(thisActId == 'FontStyle' && ButtonValue){
							EditorDoc.execCommand('RemoveFormat');
							EditorDoc.execCommand(thisActId, 0, '0UC7740UC6D00UBB380UCC9C0UC7AC');
							
							var FornArray	=	EditorDoc.all.tags("FONT");
							for(i=0; i<FontArray.length; i++){
								if(FontArray[i].face == '0UC7740UC6D00UBB380UCC9C0UC7AC'){
									FontArray[i].face		= "";
									FontArray[i].className	= ButtonValue;
									FontArray[i].outerHTML	= FontArray[i].outerHTML.replace(/face=['"]+/, "");
								}
							}
							ButtonObj.selectedIndex = 0;
					
					//**	���ڻ�, ���� ����
						}else if(thisActId == 'ForeColor' || thisActId == 'BackColor'){
							var OldColor	= Editor_Detect_RGB(EditorDoc.queryCommandValue(thisActId));
							var NewColor	= showModalDialog(Editor_Root_Dir + 'PopupWin/Editor_SelectColor.htm', OldColor, 'resizable: no; help: no; status: no; scroll: no;');
							
							if(NewColor != null && NewColor != OldColor){
								EditorDoc.execCommand(thisActId, false, NewColor);
							}
					
					
					//**	��Ÿ ���� �ױ� ���� ���� �����ϱ�
						}else{
							
							//**	������ ��ũ
								if(thisActId == 'CreateLink'){
									EditorDoc.execCommand(thisActId, 1);
								}
							
							//**	�׸� �����ϱ�
								else if(thisActId == 'InsertImage'){
									showModalDialog(Editor_Root_Dir + 'PopupWin/Editor_InsertImage.htm?'+ thisObjName, window, 'dialogHeight : 335px; dialogWidth : 450px; resizable: no; help: no; status: no; scroll: yes;');
								}
							
							//**	���̺� �����ϱ�
								else if(thisActId == 'InsertTable'){
									showModalDialog(Editor_Root_Dir + 'PopupWin/Editor_InsertTable.htm?'+ thisObjName, window, 'dialogHeight : 465px; dialogWidth : 410px; resizable: yes; help: no; status: no; scroll: no;');
								}
							
							//**	�÷��� �����ϱ�
								else if(thisActId == 'InsertFlash'){
									showModalDialog(Editor_Root_Dir + 'PopupWin/Editor_InsertFlash.htm?'+ thisObjName, window, 'dialogHeight : 160px; dialogWidth : 450px; resizable: yes; help: no; status: no; scroll: no;');
								}
							
							//**	������ �����ϱ�
								else if(thisActId == 'InsertMovie'){
									showModalDialog(Editor_Root_Dir + 'PopupWin/Editor_InsertMovie.htm?'+ thisObjName, window, 'dialogHeight : 160px; dialogWidth : 450px; resizable: yes; help: no; status: no; scroll: no;');
								}
								
							//**	��Ÿ �ٸ� ��Ÿ�� �ױ�
								else{
									EditorDoc.execCommand(thisActId);
								}
						}
				
				Editor_Event_Handlers(thisObjName);
		}
//-->