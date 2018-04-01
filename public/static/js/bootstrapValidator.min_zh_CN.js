(function ($) {
    /**
     * Traditional Chinese language package
     * Translated by @tureki
     */
    $.fn.bootstrapValidator.i18n = $.extend(true, $.fn.bootstrapValidator.i18n, {
        base64: {
            'default': BOOTSTRAP_BASE64
        },
        between: {
            'default': '请输入不小于%s 且不大于%s 的值',
            notInclusive: '请输入不小于等于%s 且不大于等于%s 的值'
        },
        callback: {
            'default': BOOTSTRAP_CALLBACK
        },
        choice: {
            'default': BOOTSTRAP_CALLBACK,
            less: '最少选择 %s 个选项',
            more: '最多选择 %s 个选项',
            between: '请选择 %s 至 %s 个选项'
        },
        creditCard: {
            'default': BOOTSTRAP_CREDIT
        },
        cusip: {
            'default': BOOTSTRAP_CUSIP
        },
        cvv: {
            'default': BOOTSTRAP_CVV
        },
        date: {
            'default': BOOTSTRAP_DATE
        },
        different: {
            'default': BOOTSTRAP_DIFFERENT
        },
        digits: {
            'default': BOOTSTRAP_DIGITS
        },
        ean: {
            'default': BOOTSTRAP_EAN
        },
        emailAddress: {
            'default': BOOTSTRAP_EMAIL
        },
        file: {
            'default': BOOTSTRAP_FILE
        },
        greaterThan: {
            'default': '请输入大于或等于 %s 的值',
            notInclusive: '请输入大于 %s 的值'
        },
        grid: {
            'default': BOOTSTRAP_GRID
        },
        hex: {
            'default': BOOTSTRAP_HEX
        },
        hexColor: {
            'default': BOOTSTRAP_HEXCOLOR
        },
        iban: {
            'default': BOOTSTRAP_IBAN,
            countryNotSupported: '不支援该国家代码%s',
            country: '请输入有效的 %s IBAN编号 ',
            countries: {
                AD: '安道​​尔',
                AE: '阿联酋',
                AL: '阿尔巴尼亚',
                AO: '安哥拉',
                AT: '奥地利',
                AZ: '阿塞拜疆',
                BA: '波斯尼亚和黑塞哥维那',
                BE: '比利时',
                BF: '布基纳法索',
                BG: '保加利亚',
                BH: '巴林',
                BI: '布隆迪',
                BJ: '贝宁',
                BR: '巴西',
                CH: '瑞士',
                CI: '象牙海岸',
                CM: '喀麦隆',
                CR: '哥斯达黎加',
                CV: '佛得角',
                CY: '塞浦路斯',
                CZ: '捷克共和国',
                DE: '德国',
                DK: '丹麦',
                DO: '多明尼加共和国',
                DZ: '阿尔及利亚',
                EE: '爱沙尼亚',
                ES: '西班牙',
                FI: '芬兰',
                FO: '法罗群岛',
                FR: '法国',
                GB: '英国',
                GE: '格鲁吉亚',
                GI: '直布罗陀',
                GL: '格陵兰岛',
                GR: '希腊',
                GT: '危地马拉',
                HR: '克罗地亚',
                HU: '匈牙利',
                IE: '爱尔兰',
                IL: '以色列',
                IR: '伊朗',
                IS: '冰岛',
                IT: '意大利',
                JO: '乔丹',
                KW: '科威特',
                KZ: '哈萨克斯坦',
                LB: '黎巴嫩',
                LI: '列支敦士登',
                LT: '立陶宛',
                LU: '卢森堡',
                LV: '拉脱维亚',
                MC: '摩纳哥',
                MD: '摩尔多瓦',
                ME: '黑山共和国',
                MG: '马达加斯加',
                MK: '马其顿',
                ML: '马里',
                MR: '毛里塔尼亚',
                MT: '马耳他',
                MU: '毛里求斯',
                MZ: '莫桑比克',
                NL: '荷兰',
                NO: '挪威',
                PK: '巴基斯坦',
                PL: '波兰',
                PS: '巴勒斯坦',
                PT: '葡萄牙',
                QA: '卡塔尔',
                RO: '罗马尼亚',
                RS: '塞尔维亚',
                SA: '沙特阿拉伯',
                SE: '瑞典',
                SI: '斯洛文尼亚',
                SK: '斯洛伐克',
                SM: '圣马力诺',
                SN: '塞内加尔',
                TN: '突尼斯',
                TR: '土耳其',
                VG: '英属维尔京群岛'
            }
        },
        id: {
            'default': BOOTSTRAP_ID,
            countryNotSupported: '不支援该国家代码%s',
            country: '请输入有效的%s 身份证字号码',
            countries: {
                BA: '波斯尼亚和黑塞哥维那',
                BG: '保加利亚',
                BR: '巴西',
                CH: '瑞士',
                CL: '智利',
                CZ: '捷克',
                DK: '丹麦',
                EE: '爱沙尼亚',
                ES: '西班牙语',
                FI: '芬兰',
                HR: '克罗地亚',
                IE: '爱尔兰',
                IS: '冰岛',
                LT: '立陶宛',
                LV: '拉脱维亚语',
                ME: '黑山共和国',
                MK: '马其顿',
                NL: '荷兰',
                RO: '罗马尼亚',
                RS: '塞尔维亚',
                SE: '瑞典',
                SI: '斯洛文尼亚',
                SK: '斯洛伐克',
                SM: '圣马力诺',
                ZA: '南非'
            }
        },
        identical: {
            'default': BOOTSTRAP_IDENTICAL
        },
        imei: {
            'default': BOOTSTRAP_IMEI
        },
        imo: {
            'default': BOOTSTRAP_IMO
        },
        integer: {
            'default': BOOTSTRAP_INTEGER
        },
        ip: {
            'default': BOOTSTRAP_IP,
            ipv4: BOOTSTRAP_IP4,
            ipv6: BOOTSTRAP_IP6
        },
        isbn: {
            'default': BOOTSTRAP_ISBN
        },
        isin: {
            'default': BOOTSTRAP_ISIN
        },
        ismn: {
            'default': BOOTSTRAP_ISMN
        },
        issn: {
            'default': BOOTSTRAP_ISSN
        },
        lessThan: {
            'default': '请输入小于或等于 %s 的值',
            notInclusive: '请输入小于 %s 的值'
        },
        mac: {
            'default': BOOTSTRAP_MAC
        },
        meid: {
            'default': BOOTSTRAP_MEID
        },
        notEmpty: {
            'default': BOOTSTRAP_NOTEMPTY
        },
        numeric: {
            'default': BOOTSTRAP_NUMERIC
        },
        phone: {
            'default': BOOTSTRAP_PHONE,
            countryNotSupported: '不支援该国家代码%s',
            country: '请输入有效的 %s 电话号码',
            countries: {
                ES: '西班牙',
                GB: '英国',
                FR: '法国',
                US: '美国'
            }
        },
        regexp: {
            'default': BOOTSTRAP_REGEXP
        },
        remote: {
            'default': BOOTSTRAP_REGEXP
        },
        rtn: {
            'default': BOOTSTRAP_RTN
        },
        sedol: {
            'default': BOOTSTRAP_SEDOL
        },
        siren: {
            'default': BOOTSTRAP_SIREN
        },
        siret: {
            'default': BOOTSTRAP_SIRET
        },
        step: {
            'default': '请输入 %s 个有效步骤'
        },
        stringCase: {
            'default': BOOTSTRAP_STRINGCASE,
            upper: BOOTSTRAP_STRINGCASE2
        },
        stringLength: {
            'default': BOOTSTRAP_STRINGLENGTH,
            less: '请输入小于 %s 个字',
            more: '请输入大于 %s 个字',
            between: '请输入介于 %s 至 %s 个字'
        },
        uri: {
            'default': BOOTSTRAP_URI
        },
        uuid: {
            'default': BOOTSTRAP_UUID,
            version: '请输入符合版本 %s 的UUID'
        },
        vat: {
            'default': BOOTSTRAP_VAT,
            countryNotSupported: '不支援该国家代码%s',
            country: '请输入有效的 %s VAT',
            countries: {
                AT: '奥地利',
                BE: '比利时',
                BG: '保加利亚',
                CH: '瑞士',
                CY: '塞浦路斯',
                CZ: '捷克',
                DE: '德语',
                DK: '丹麦',
                EE: '爱沙尼亚',
                ES: '西班牙',
                FI: '芬兰',
                FR: '法语',
                GB: '英国',
                GR: '希腊',
                EL: '希腊',
                HU: '匈牙利',
                HR: '克罗地亚',
                IE: '爱尔兰',
                IT: '意大利',
                LT: '立陶宛',
                LU: '卢森堡',
                LV: '拉脱维亚语',
                MT: '马耳他',
                NL: '荷兰',
                NO: '挪威',
                PL: '波兰',
                PT: '葡萄牙',
                RO: '罗马尼亚',
                RU: '俄罗斯',
                RS: '塞尔维亚',
                SE: '瑞典',
                SI: '斯洛文尼亚',
                SK: '斯洛伐克'
            }
        },
        vin: {
            'default': BOOTSTRAP_VIN
        },
        zipCode: {
            'default': BOOTSTRAP_ZIPCODE,
            countryNotSupported: '不支援该国家代码%s',
            country: '请输入有效的 %s',
            countries: {
                CA: '加拿大 邮政编码',
                DK: '丹麦 邮政编码',
                GB: '英国 邮政编码',
                IT: '意大利 邮政编码',
                NL: '荷兰 邮政编码',
                SE: '瑞士 邮政编码',
                SG: '新加坡 邮政编码',
                US: '美国 邮政编码'
            }
        }
    });
}(window.jQuery));


/*默认form*/
$(document).ready(function() {
	$('form').each(function(index, element) {
		var formid =$(this).attr('id');
		/*$('#'+formid+'').find('input').each(function(index, element) {
			if($(this).prop('required')&&!$(this).attr('data-bv-notempty-message')&&!$(this).attr('data-bv-message')){
				$(this).attr('data-bv-notempty-message','('+$(this).parents('.form-group').children('label').eq(0).text()+')未填写');
				}
		});*/
		var phonepatt='^(13[0-9]|14[5|7]|15[0|1|2|3|5|6|7|8|9]|18[0|1|2|3|5|6|7|8|9])\\d{8}$';
		$('#'+formid+'').find('input[type=tel]').attr({
			  "pattern":phonepatt,
			  "data-bv-regexp-message":"请输入正确的手机号码,例:15999999999"
			  })
		$('#'+formid+'').bootstrapValidator({
			feedbackIcons: {
				valid: 'glyphicon glyphicon-ok',
				invalid: 'glyphicon glyphicon-remove',
				validating: 'glyphicon glyphicon-refresh'
			},
		fields: {/*确认密码验证*/
			username: {
				validators: {
					notEmpty: {
						message: BOOTSTRAP_USERNAME_EMPTY
					},
					stringLength: {
						min: 2,
						max: 32,
						message: BOOTSTRAP_USERNAME_LENGTH
					},
					 remote: {
					 	url: '/checkNew?type=username',
					 	message: BOOTSTRAP_USERNAME_EXIST,
					 	delay: 2000
					}
				}
				
			},
			regemail: {
				validators: {
					notEmpty: {
						message: BOOTSTRAP_REGEMAIL_EMPTY
					},
					stringLength: {
						min: 6,
						max: 32,
						message: BOOTSTRAP_REGEMAIL_LENGTH
					},
					 remote: {
					 	url: '/checkNew?type=email',
					 	message: BOOTSTRAP_REGEMAIL_EXIST,
					 	delay: 2000
					}
				}
				
			},
			statement: {
				validators: {
					notEmpty: {
						message: BOOTSTRAP_STATEMENT
					}
				}
				
			},
			repassword: {
				validators: {
					identical: {
						field: 'password',
						message: BOOTSTRAP_REGPASSWORD2
					}
				}
			},
			password: {
				validators: {
					notEmpty: {
						message: BOOTSTRAP_LOGPASSWORD
					},
					stringLength: {
						min: 6,
						max: 32,
						message: BOOTSTRAP_LOGPASS_LENGTH
					}
				}
				
			},
			relog_pass: {
				validators: {
					identical: {
						field: 'password',
						message: BOOTSTRAP_REGPASSWORD2
					}
				}
			},
			pay_pass: {
				validators: {
					notEmpty: {
						message: BOOTSTRAP_PAYPASSWORD
					},
					stringLength: {
						min: 8,
						max: 50,
						message: BOOTSTRAP_PAYPASWORD_LENGTH
					},
					regexp: {
						regexp: /^(?=.*\d.*)(?=.*[a-zA-Z].*).{8,50}$/,
						message: BOOTSTRAP_PASSWORD_REG
					}

				}
				
			},
			secret: {
				validators: {
					notEmpty: {
						message: BOOTSTRAP_SEED_EMPTY
					},
					stringLength: {
						min: 56,
						max: 56,
						message: BOOTSTRAP_SEED_LENGTH
					},
					regexp: {
						regexp: /^S[A-Z|0-9]{55,55}$/,
						message: BOOTSTRAP_SEED_REG
					}

				}
				
			},
			repay_pass: {
				validators: {
					identical: {
						field: 'pay_pass',
						message: BOOTSTRAP_REGPASSWORD2
					}
				}
			},
		}
		});
    });
    
    
});
/*默认手机表单*/

/*密码强度*/
function ChangeQD()
 {
         var pwQiangdu=document.getElementById("pwQiangdu");//强度内容框
      var password=document.getElementById("pay_password");
      var ls=f_CalcPwdRank(password.value);
      //pwQiangdu.innerHTML="强度"+ls;
      switch(ls) { 
                case 0:    //不显示
                case 1:    //弱
                case 2:    //中
                case 3:    //强 
                 showPwRank(ls);
                break;
               default:
                showPwRank(3);
    }
 }
   //密码强度检测函数
 function f_CalcPwdRank(l_Content) 
    {
      if(l_Content.length<6||/^[0-9]{1,8}$/.test(l_Content)) {showPwRank(0);return 0;}
   var ls = 0; 
      if (l_Content.match(/[a-z]/g)){ ls++; }
      if(l_Content.match(/[A-Z]/g)){ ls++; }
      if (l_Content.match(/[0-9]/g)){ ls++; }
      if (l_Content.match(/[^a-zA-Z0-9]/g)){ ls++; }
      if (l_Content.length < 8 && ls > 1){   
        ls = 1;
      } 
      if(ls>3) 
      {
        ls=3;
      };
       return ls;
    }
 //----显示强度状态
  function showPwRank(pwRank)
       {
      //js<a href="/Web/Wytx/" target="_blank" class="innerlink">特效</a>代码：/<a href="/Web/Rjkf/" class="innerlink">软件</a>开发
   var obj = document.getElementById("pwQiangdu");
   var qdbox = document.getElementById("qdbox");
   var password=document.getElementById("pay_password")//密码输入框
      switch(pwRank)
          {
            case 0:
         qdbox.className="qdbox_hongse";
      obj.className = "qdhongse";
      obj.innerHTML="很弱:"+password.value.length;
         if(password.value.length<1)
         {
           qdbox.className="qdbox_hongse setClose";
         }
         else
         {
          qdbox.className="qdbox_hongse setShow";
         }
                break;
            case 1:
        qdbox.className="qdbox_cengse";
                 obj.innerHTML = "一般:"+password.value.length;
                 obj.className = "qdcengse";
                break;
            case 2:
                 qdbox.className="qdbox_lanse";
     obj.innerHTML = "良好:"+password.value.length;
     obj.className = "qdlanse";
                break;
            case 3:
                 qdbox.className="qdbox_luse";
     obj.innerHTML = "超强:"+password.value.length;
        obj.className = "qdluse";
                break;
         }
      }