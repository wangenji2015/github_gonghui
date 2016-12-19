<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "gh_user".
 *
 * @property integer $id
 * @property string $user_name
 * @property string $user_pwd
 * @property integer $create_time
 * @property integer $update_time
 * @property string $login_ip
 * @property integer $group_id
 * @property integer $is_effect
 * @property integer $is_delete
 * @property string $email
 * @property string $mobile
 * @property integer $score
 * @property integer $total_score
 * @property double $money
 * @property string $verify
 * @property string $code
 * @property integer $pid
 * @property integer $login_time
 * @property integer $referral_count
 * @property string $password_verify
 * @property integer $integrate_id
 * @property string $sina_id
 * @property string $renren_id
 * @property string $kaixin_id
 * @property string $weixin_id
 * @property string $sohu_id
 * @property string $lottery_mobile
 * @property string $lottery_verify
 * @property integer $verify_create_time
 * @property string $tencent_id
 * @property string $referer
 * @property integer $login_pay_time
 * @property integer $focus_count
 * @property integer $focused_count
 * @property integer $province_id
 * @property integer $city_id
 * @property integer $sex
 * @property string $my_intro
 * @property integer $is_merchant
 * @property string $merchant_name
 * @property integer $is_daren
 * @property string $daren_title
 * @property integer $step
 * @property integer $byear
 * @property integer $bmonth
 * @property integer $bday
 * @property integer $locate_time
 * @property double $xpoint
 * @property double $ypoint
 * @property integer $topic_count
 * @property integer $fav_count
 * @property integer $faved_count
 * @property integer $dp_count
 * @property integer $insite_count
 * @property integer $outsite_count
 * @property integer $level_id
 * @property integer $point
 * @property string $sina_app_key
 * @property string $sina_app_secret
 * @property integer $is_syn_sina
 * @property string $tencent_app_key
 * @property string $tencent_app_secret
 * @property integer $is_syn_tencent
 * @property string $sina_token
 * @property string $t_access_token
 * @property string $t_openkey
 * @property string $t_openid
 * @property string $avatar
 * @property integer $is_tmp
 * @property string $qqv2_id
 * @property string $qq_token
 * @property string $t_name
 * @property string $dev_type
 * @property string $device_token
 * @property string $wx_openid
 * @property integer $dc_is_share_first
 * @property string $nick_name
 * @property string $card_name
 * @property string $bank_card
 * @property string $sy_id
 * @property integer $depart_id
 * @property string $depart_name
 * @property integer $parent_id
 * @property integer $quxian_id
 * @property string $quxian_name
 * @property string $identity_card
 * @property string $pay_pwd
 * @property string $is_setpwd
 * @property integer $department_id
 * @property string $member_name
 * @property integer $has_authority
 * @property integer $is_get_score
 * @property integer $is_bankcard_score
 * @property integer $share_count
 * @property integer $share_day
 * @property integer $share_time
 */
class GhUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gh_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_pwd', 'create_time', 'update_time', 'login_ip', 'group_id', 'is_effect', 'is_delete', 'score', 'total_score', 'money', 'verify', 'code', 'pid', 'login_time', 'referral_count', 'password_verify', 'integrate_id', 'sina_id', 'renren_id', 'kaixin_id', 'weixin_id', 'sohu_id', 'lottery_mobile', 'lottery_verify', 'verify_create_time', 'tencent_id', 'referer', 'login_pay_time', 'focus_count', 'focused_count', 'province_id', 'city_id', 'my_intro', 'is_merchant', 'merchant_name', 'is_daren', 'daren_title', 'step', 'byear', 'bmonth', 'bday', 'topic_count', 'fav_count', 'faved_count', 'dp_count', 'insite_count', 'outsite_count', 'level_id', 'point', 'sina_app_key', 'sina_app_secret', 'is_syn_sina', 'tencent_app_key', 'tencent_app_secret', 'is_syn_tencent', 'sina_token', 't_access_token', 't_openkey', 't_openid', 'is_tmp', 'qqv2_id', 'qq_token', 't_name', 'wx_openid', 'dc_is_share_first', 'nick_name', 'card_name', 'bank_card', 'depart_id', 'depart_name', 'parent_id', 'quxian_id', 'quxian_name', 'identity_card', 'pay_pwd', 'is_setpwd', 'is_get_score', 'is_bankcard_score', 'share_count', 'share_day', 'share_time'], 'required'],
            [['create_time', 'update_time', 'group_id', 'is_effect', 'is_delete', 'score', 'total_score', 'pid', 'login_time', 'referral_count', 'integrate_id', 'verify_create_time', 'login_pay_time', 'focus_count', 'focused_count', 'province_id', 'city_id', 'sex', 'is_merchant', 'is_daren', 'step', 'byear', 'bmonth', 'bday', 'locate_time', 'topic_count', 'fav_count', 'faved_count', 'dp_count', 'insite_count', 'outsite_count', 'level_id', 'point', 'is_syn_sina', 'is_syn_tencent', 'is_tmp', 'dc_is_share_first', 'depart_id', 'parent_id', 'quxian_id', 'department_id', 'has_authority', 'is_get_score', 'is_bankcard_score', 'share_count', 'share_day', 'share_time'], 'integer'],
            [['money', 'xpoint', 'ypoint'], 'number'],
            [['user_name', 'user_pwd', 'login_ip', 'email', 'mobile', 'verify', 'code', 'password_verify', 'sina_id', 'renren_id', 'kaixin_id', 'weixin_id', 'sohu_id', 'lottery_mobile', 'lottery_verify', 'tencent_id', 'referer', 'my_intro', 'merchant_name', 'daren_title', 'sina_app_key', 'sina_app_secret', 'tencent_app_key', 'tencent_app_secret', 'sina_token', 't_access_token', 't_openkey', 't_openid', 'avatar', 'qqv2_id', 'qq_token', 't_name', 'device_token', 'wx_openid', 'sy_id', 'depart_name', 'quxian_name', 'pay_pwd', 'is_setpwd'], 'string', 'max' => 255],
            [['dev_type', 'identity_card'], 'string', 'max' => 20],
            [['nick_name', 'card_name'], 'string', 'max' => 10],
            [['bank_card'], 'string', 'max' => 22],
            [['member_name'], 'string', 'max' => 32],
            [['user_name'], 'unique'],
            [['email'], 'unique'],
            [['mobile'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_name' => 'User Name',
            'user_pwd' => 'User Pwd',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
            'login_ip' => 'Login Ip',
            'group_id' => 'Group ID',
            'is_effect' => 'Is Effect',
            'is_delete' => 'Is Delete',
            'email' => 'Email',
            'mobile' => 'Mobile',
            'score' => 'Score',
            'total_score' => 'Total Score',
            'money' => 'Money',
            'verify' => 'Verify',
            'code' => 'Code',
            'pid' => 'Pid',
            'login_time' => 'Login Time',
            'referral_count' => 'Referral Count',
            'password_verify' => 'Password Verify',
            'integrate_id' => 'Integrate ID',
            'sina_id' => 'Sina ID',
            'renren_id' => 'Renren ID',
            'kaixin_id' => 'Kaixin ID',
            'weixin_id' => 'Weixin ID',
            'sohu_id' => 'Sohu ID',
            'lottery_mobile' => 'Lottery Mobile',
            'lottery_verify' => 'Lottery Verify',
            'verify_create_time' => 'Verify Create Time',
            'tencent_id' => 'Tencent ID',
            'referer' => 'Referer',
            'login_pay_time' => 'Login Pay Time',
            'focus_count' => 'Focus Count',
            'focused_count' => 'Focused Count',
            'province_id' => 'Province ID',
            'city_id' => 'City ID',
            'sex' => 'Sex',
            'my_intro' => 'My Intro',
            'is_merchant' => 'Is Merchant',
            'merchant_name' => 'Merchant Name',
            'is_daren' => 'Is Daren',
            'daren_title' => 'Daren Title',
            'step' => 'Step',
            'byear' => 'Byear',
            'bmonth' => 'Bmonth',
            'bday' => 'Bday',
            'locate_time' => 'Locate Time',
            'xpoint' => 'Xpoint',
            'ypoint' => 'Ypoint',
            'topic_count' => 'Topic Count',
            'fav_count' => 'Fav Count',
            'faved_count' => 'Faved Count',
            'dp_count' => 'Dp Count',
            'insite_count' => 'Insite Count',
            'outsite_count' => 'Outsite Count',
            'level_id' => 'Level ID',
            'point' => 'Point',
            'sina_app_key' => 'Sina App Key',
            'sina_app_secret' => 'Sina App Secret',
            'is_syn_sina' => 'Is Syn Sina',
            'tencent_app_key' => 'Tencent App Key',
            'tencent_app_secret' => 'Tencent App Secret',
            'is_syn_tencent' => 'Is Syn Tencent',
            'sina_token' => 'Sina Token',
            't_access_token' => 'T Access Token',
            't_openkey' => 'T Openkey',
            't_openid' => 'T Openid',
            'avatar' => 'Avatar',
            'is_tmp' => 'Is Tmp',
            'qqv2_id' => 'Qqv2 ID',
            'qq_token' => 'Qq Token',
            't_name' => 'T Name',
            'dev_type' => 'Dev Type',
            'device_token' => 'Device Token',
            'wx_openid' => 'Wx Openid',
            'dc_is_share_first' => 'Dc Is Share First',
            'nick_name' => 'Nick Name',
            'card_name' => 'Card Name',
            'bank_card' => 'Bank Card',
            'sy_id' => 'Sy ID',
            'depart_id' => 'Depart ID',
            'depart_name' => 'Depart Name',
            'parent_id' => 'Parent ID',
            'quxian_id' => 'Quxian ID',
            'quxian_name' => 'Quxian Name',
            'identity_card' => 'Identity Card',
            'pay_pwd' => 'Pay Pwd',
            'is_setpwd' => 'Is Setpwd',
            'department_id' => 'Department ID',
            'member_name' => 'Member Name',
            'has_authority' => 'Has Authority',
            'is_get_score' => 'Is Get Score',
            'is_bankcard_score' => 'Is Bankcard Score',
            'share_count' => 'Share Count',
            'share_day' => 'Share Day',
            'share_time' => 'Share Time',
        ];
    }
}
