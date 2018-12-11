-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2017 �?12 �?12 �?13:51
-- 服务器版本: 5.5.53
-- PHP 版本: 5.5.38

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `blog`
--

-- --------------------------------------------------------

--
-- 表的结构 `blog_article`
--

CREATE TABLE IF NOT EXISTS `blog_article` (
  `art_id` int(11) NOT NULL AUTO_INCREMENT,
  `art_title` varchar(100) DEFAULT '' COMMENT '文章标题',
  `art_tag` varchar(100) DEFAULT '' COMMENT '文章关键词',
  `art_description` varchar(255) DEFAULT '' COMMENT '文章描述',
  `art_thumb` varchar(255) DEFAULT '' COMMENT '文章缩略图',
  `art_content` text COMMENT '文章内容',
  `art_time` int(11) DEFAULT '0' COMMENT '发布时间',
  `art_editor` varchar(50) DEFAULT '' COMMENT '作者',
  `art_view` int(11) DEFAULT '0' COMMENT '查看次数',
  `cate_id` int(11) NOT NULL DEFAULT '0' COMMENT '分类ID',
  PRIMARY KEY (`art_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='//文章表' AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `blog_article`
--

INSERT INTO `blog_article` (`art_id`, `art_title`, `art_tag`, `art_description`, `art_thumb`, `art_content`, `art_time`, `art_editor`, `art_view`, `cate_id`) VALUES
(2, '习近平致信祝贺第四届世界互联网大会开幕强调 尊重网络主权 发扬伙伴精神 共同搭乘互联网和数字经济发展的快车', '段拓,习近平,西安,北京', '第四届世界互联网大会3日上午在浙江省乌镇开幕', 'uploads/20171203232846144.jpg', '<p style="margin-top: 0px; margin-bottom: 10px; padding: 0px; line-height: 1.75em; font-stretch: normal; font-family: Arial, 宋体; text-indent: 2em; white-space: normal; background-color: rgb(255, 255, 255);"><strong>央视网消息</strong>（新闻联播）：第四届世界互联网大会3日上午在浙江省乌镇开幕。国家主席习近平发来贺信，代表中国政府和中国人民，并以他个人的名义，向大会的召开致以热烈的祝贺，向出席会议的各国代表、国际机构负责人和专家学者、企业家等各界人士表示诚挚的欢迎，希望大家集思广益、增进共识，深化互联网和数字经济交流合作，让互联网发展成果更好造福世界各国人民。</p><p style="margin-top: 0px; margin-bottom: 10px; padding: 0px; line-height: 1.75em; font-stretch: normal; font-family: Arial, 宋体; text-indent: 2em; white-space: normal; background-color: rgb(255, 255, 255);">习近平在贺信中指出，当前，以信息技术为代表的新一轮科技和产业革命正在萌发，为经济社会发展注入了强劲动力，同时，互联网发展也给世界各国主权、安全、发展利益带来许多新的挑战。全球互联网治理体系变革进入关键时期，构建网络空间命运共同体日益成为国际社会的广泛共识。我们倡导“四项原则”“五点主张”，就是希望同国际社会一道，尊重网络主权，发扬伙伴精神，大家的事由大家商量着办，做到发展共同推进、安全共同维护、治理共同参与、成果共同分享。</p><p style="margin-top: 0px; margin-bottom: 10px; padding: 0px; line-height: 1.75em; font-stretch: normal; font-family: Arial, 宋体; text-indent: 2em; white-space: normal; background-color: rgb(255, 255, 255);">习近平强调，中共十九大制定了新时代中国特色社会主义的行动纲领和发展蓝图，提出要建设网络强国、数字中国、智慧社会，推动互联网、大数据、人工智能和实体经济深度融合，发展数字经济、共享经济，培育新增长点、形成新动能。中国数字经济发展将进入快车道。中国希望通过自己的努力，推动世界各国共同搭乘互联网和数字经济发展的快车。中国对外开放的大门不会关闭，只会越开越大。</p><p><br/></p>', 1512314928, '段拓', 12, 1),
(3, '习近平致第四届世界互联网大会的贺信', '信息技术 ,习近平', '以信息技术为代表的新一轮科技和产业革命正在萌发', '', '<p style="margin-top: 0px; margin-bottom: 15px; padding: 0px; color: rgb(64, 64, 64); font-family: &quot;PingFang SC&quot;, &quot;Lantinghei SC&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, &quot;Microsoft YaHei&quot;, å¾®è½¯é›…é»‘, STHeitiSC-Light, simsun, å®‹ä½“, &quot;WenQuanYi Zen Hei&quot;, &quot;WenQuanYi Micro Hei&quot;, sans-serif; font-size: 18px; white-space: normal; background-color: rgb(255, 255, 255);">&nbsp; &nbsp; &nbsp; &nbsp; 值此第四届世界互联网大会开幕之际，我谨代表中国政府和中国人民，并以我个人的名义，向大会的召开致以热烈的祝贺！向出席会议的各国代表、国际机构负责人和专家学者、企业家等各界人士表示诚挚的欢迎！</p><p style="margin-top: 0px; margin-bottom: 15px; padding: 0px; color: rgb(64, 64, 64); font-family: &quot;PingFang SC&quot;, &quot;Lantinghei SC&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, &quot;Microsoft YaHei&quot;, å¾®è½¯é›…é»‘, STHeitiSC-Light, simsun, å®‹ä½“, &quot;WenQuanYi Zen Hei&quot;, &quot;WenQuanYi Micro Hei&quot;, sans-serif; font-size: 18px; white-space: normal; background-color: rgb(255, 255, 255);">　　当前，以信息技术为代表的新一轮科技和产业革命正在萌发，为经济社会发展注入了强劲动力，同时，互联网发展也给世界各国主权、安全、发展利益带来许多新的挑战。全球互联网治理体系变革进入关键时期，构建网络空间命运共同体日益成为国际社会的广泛共识。我们倡导“四项原则”、“五点主张”，就是希望与国际社会一道，尊重网络主权，发扬伙伴精神，大家的事由大家商量着办，做到发展共同推进、安全共同维护、治理共同参与、成果共同分享。</p><p style="margin-top: 0px; margin-bottom: 15px; padding: 0px; color: rgb(64, 64, 64); font-family: &quot;PingFang SC&quot;, &quot;Lantinghei SC&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, &quot;Microsoft YaHei&quot;, å¾®è½¯é›…é»‘, STHeitiSC-Light, simsun, å®‹ä½“, &quot;WenQuanYi Zen Hei&quot;, &quot;WenQuanYi Micro Hei&quot;, sans-serif; font-size: 18px; white-space: normal; background-color: rgb(255, 255, 255);">　　中共十九大制定了新时代中国特色社会主义的行动纲领和发展蓝图，提出要建设网络强国、数字中国、智慧社会，推动互联网、大数据、人工智能和实体经济深度融合，发展数字经济、共享经济，培育新增长点、形成新动能。中国数字经济发展将进入快车道。中国希望通过自己的努力，推动世界各国共同搭乘互联网和数字经济发展的快车。中国对外开放的大门不会关闭，只会越开越大。</p><p style="margin-top: 0px; margin-bottom: 15px; padding: 0px; color: rgb(64, 64, 64); font-family: &quot;PingFang SC&quot;, &quot;Lantinghei SC&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, &quot;Microsoft YaHei&quot;, å¾®è½¯é›…é»‘, STHeitiSC-Light, simsun, å®‹ä½“, &quot;WenQuanYi Zen Hei&quot;, &quot;WenQuanYi Micro Hei&quot;, sans-serif; font-size: 18px; white-space: normal; background-color: rgb(255, 255, 255);">　　本届大会以“发展数字经济　促进开放共享——携手共建网络空间命运共同体”为主题，希望大家集思广益、增进共识，深化互联网和数字经济交流合作，让互联网发展成果更好造福世界各国人民。</p><p style="margin-top: 0px; margin-bottom: 15px; padding: 0px; color: rgb(64, 64, 64); font-family: &quot;PingFang SC&quot;, &quot;Lantinghei SC&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, &quot;Microsoft YaHei&quot;, å¾®è½¯é›…é»‘, STHeitiSC-Light, simsun, å®‹ä½“, &quot;WenQuanYi Zen Hei&quot;, &quot;WenQuanYi Micro Hei&quot;, sans-serif; font-size: 18px; white-space: normal; background-color: rgb(255, 255, 255);">　　预祝大会圆满成功！</p><p><br/></p>', 1512353123, '段拓', 11, 1),
(4, '宋丹丹疑回应与章子怡争执：表演艺术要直指人心', '凤凰网', '凤凰网娱乐讯', 'uploads/20171210131207442.jpg', '<p style="margin: 23px auto 0px; padding: 0px; list-style: none; font-size: 14px; line-height: 26px; font-family: SimSun; color: rgb(43, 43, 43); white-space: normal; overflow: visible !important;">凤凰网娱乐讯 12月3日，宋丹丹在微博表示：“表演艺术要直指人心。艺术作品里可能会根据剧情的发展需要出现‘感官刺激’的情景，但‘感官刺激’是‘佐料’，不是‘主菜’。‘主菜’应该是人物命运及内心带给你的感动和思考。只给人‘感官刺激’就像捧给你一大碗‘味精’，会坏了观众的胃口及嗅觉… ”疑似回应与章子怡在《演员的诞生》节目中的争执。</p><p style="margin: 23px auto 0px; padding: 0px; list-style: none; font-size: 14px; line-height: 26px; font-family: SimSun; color: rgb(43, 43, 43); white-space: normal; overflow: visible !important;">　　在最近一期的综艺节目《演员的诞生》中，黄圣依、于明加、柴碧云共同合作了经典电视剧《我和春天有个约会》，却遭到了导师们的一致批评，为此章子怡和宋丹丹甚至起了争执，章子怡认为是演员演技方面的问题，而宋丹丹却把此次表演的失败原因推给了剧本。为此，有网友对宋丹丹的作为导师的专业程度也产生了质疑，认为她不适合站在一个指导的位置。 但她的这段话也遭到了网友反驳：“演员是一定要有二度创作的，您一直把责任推到剧本上是偏执。演员即使拿到的是个烂剧本，依旧可以演出自己的特色。”</p><p><br/></p>', 1512353206, '段拓', 1, 26),
(7, '斯科拉里离开时万人空巷 博阿斯告别时却形单影只', '斯科拉里，博阿斯', '斯科拉里离开时万人空巷 博阿斯告别时却形单影只', 'uploads/20171210131041865.jpg', '<p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; list-style: none; font-size: 14px; line-height: 26px; font-family: SimSun; color: rgb(43, 43, 43); white-space: normal; overflow: visible !important;">12月3日深夜，刚刚离任的上海上港前主帅博阿斯乘飞机离开上海。在飞离上海时，博阿斯独自一人离开，并没有上港俱乐部人员、助手、家人的陪伴，仅有部分上港球迷为葡萄牙教头送行。</p><p style="margin: 23px auto 0px; padding: 0px; list-style: none; font-size: 14px; line-height: 26px; font-family: SimSun; color: rgb(43, 43, 43); white-space: normal; overflow: visible !important;"><img src="/ueditor/php/upload/image/20171204/1512369581673404.jpg"/></p><p style="margin: 23px auto 0px; padding: 0px; list-style: none; font-size: 14px; line-height: 26px; font-family: SimSun; color: rgb(43, 43, 43); white-space: normal; overflow: visible !important;">　　11月30日晚，上海上港集团俱乐部官方宣布，主帅博阿斯离任。在执教上港392天时间里，博阿斯率队获得三亚王（中超亚军、足协杯亚军、亚冠东亚区亚军），打了51场比赛，取得了30胜9平12负，胜率高达58.8%。而在这个赛季的执教中，博阿斯颇具争议，曾3次被中国足协处罚，甚至在亚冠中向亚足联开炮。</p><p style="margin: 23px auto 0px; padding: 0px; list-style: none; font-size: 14px; line-height: 26px; font-family: SimSun; color: rgb(43, 43, 43); white-space: normal; overflow: visible !important;">　　昨晚，博阿斯乘坐晚10点的航班离开上海。据悉，博阿斯是独自一人离开上海的，也没有上港俱乐部工作人员、博阿斯的助手和家人送行，机场只出现了少量的上港球迷。此番离去是与上海足球永别？据网友爆料，博阿斯定于本月16日离开上海，昨晚只是暂出行。</p><p style="margin: 23px auto 0px; padding: 0px; list-style: none; font-size: 14px; line-height: 26px; font-family: SimSun; color: rgb(43, 43, 43); white-space: normal; overflow: visible !important;"><img src="/ueditor/php/upload/image/20171204/1512369582554722.jpg"/></p><p style="margin: 23px auto 0px; padding: 0px; list-style: none; font-size: 14px; line-height: 26px; font-family: SimSun; color: rgb(43, 43, 43); white-space: normal; overflow: visible !important;">　　央视记者刘思远表示：博阿斯和斯科拉里中超冠亚军教头，在中超得到的却是“骂声一片”！斯科拉里被球迷怂了一个赛季，机场却很温馨，博阿斯虽然上海球迷对他略好，但背影却有点形单影只！中超教练不好干啊，祝好运博阿斯。</p><p><br/></p>', 1512369635, '伏海星', 6, 26),
(8, '身价3000万欧跌到300万欧仅用两年，恒大外援成中超最大水货', '德国转会市场网站对2017中超联赛球员身价进行了季后例行更新', '德国转会市场网站对2017中超联赛球员身价进行了季后例行更新', 'uploads/20171210130620395.png', '<p style="border: 0px; margin-top: 0px; margin-bottom: 0px; padding: 10px 0px 20px; color: rgb(25, 25, 25); font-family: &quot;PingFang SC&quot;, Arial, 微软雅黑, 宋体, simsun, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);">近日，德国转会市场网站对2017中超联赛球员身价进行了季后例行更新。其中，奥斯卡以2300万欧稳居第一，胡尔克、莫德斯特、维特塞尔、高拉特、拉米雷斯、特谢拉、扎哈维、伊哈洛、奥古斯托九名外援身价分列第二至第十。而作为曾经中超第四高转会身价的马丁内斯，此次身价更新过后却仅有300万欧，比起当初加盟广州恒大时的3000万欧，整整掉了10倍，这仅仅是两年时间而已。</p><p style="border: 0px; margin-top: 0px; margin-bottom: 0px; padding: 10px 0px 20px; color: rgb(25, 25, 25); font-family: &quot;PingFang SC&quot;, Arial, 微软雅黑, 宋体, simsun, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);"><img src="/ueditor/php/upload/image/20171204/1512369714669660.jpeg"/></p><p style="border: 0px; margin-top: 0px; margin-bottom: 0px; padding: 10px 0px 20px; color: rgb(25, 25, 25); font-family: &quot;PingFang SC&quot;, Arial, 微软雅黑, 宋体, simsun, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);"><img src="/ueditor/php/upload/image/20171204/1512369715138553.gif"/></p><p style="border: 0px; margin-top: 0px; margin-bottom: 0px; padding: 10px 0px 20px; color: rgb(25, 25, 25); font-family: &quot;PingFang SC&quot;, Arial, 微软雅黑, 宋体, simsun, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);"><img src="http://5b0988e595225.cdn.sohucs.com/images/20171204/4446efa482714e3fb74c9c741ca00be3.gif"/></p><p style="border: 0px; margin-top: 0px; margin-bottom: 0px; padding: 10px 0px 20px; color: rgb(25, 25, 25); font-family: &quot;PingFang SC&quot;, Arial, 微软雅黑, 宋体, simsun, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);"><img src="/ueditor/php/upload/image/20171204/1512369718209909.gif"/></p><p style="border: 0px; margin-top: 0px; margin-bottom: 0px; padding: 10px 0px 20px; color: rgb(25, 25, 25); font-family: &quot;PingFang SC&quot;, Arial, 微软雅黑, 宋体, simsun, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);">2012至2014三个赛季凭借在葡超波尔图队出场133次打进92球的抢眼表演，马丁内斯实际身价最高值曾来到4000万欧，而2015年夏季转会到西甲劲旅马德里竞技时，马丁内斯是以3500万欧元的转会身价加盟的，基本上符合这名哥伦比亚前锋的实际身价。不过，为床单军团效力半个赛季出场22次仅仅打进3球后，被主帅西蒙尼撤下了首发，之后被俱乐部放在了清洗名单上。</p><p style="border: 0px; margin-top: 0px; margin-bottom: 0px; padding: 10px 0px 20px; color: rgb(25, 25, 25); font-family: &quot;PingFang SC&quot;, Arial, 微软雅黑, 宋体, simsun, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);"><img src="/ueditor/php/upload/image/20171204/1512369718348127.jpeg"/></p><p style="border: 0px; margin-top: 0px; margin-bottom: 0px; padding: 10px 0px 20px; color: rgb(25, 25, 25); font-family: &quot;PingFang SC&quot;, Arial, 微软雅黑, 宋体, simsun, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);"><img src="/ueditor/php/upload/image/20171204/1512369718125231.jpeg"/></p><p style="border: 0px; margin-top: 0px; margin-bottom: 0px; padding: 10px 0px 20px; color: rgb(25, 25, 25); font-family: &quot;PingFang SC&quot;, Arial, 微软雅黑, 宋体, simsun, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);">结果，广州恒大却成为了接盘侠，最终以创造队史最高转会身价纪录的方式，以4200万欧元引进了马丁内斯，而当属马丁内斯的实际身价是3000万欧。而就在上个月，马丁内斯在接受哥伦比亚“Alargue de Caracol”电台的专访时，透露出当初自己是非常不愿意去广州恒大，去到中超踢球三个月后更是萌发了离开的想法，感觉十分后悔。</p><p style="border: 0px; margin-top: 0px; margin-bottom: 0px; padding: 10px 0px 20px; color: rgb(25, 25, 25); font-family: &quot;PingFang SC&quot;, Arial, 微软雅黑, 宋体, simsun, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);"><img src="/ueditor/php/upload/image/20171204/1512369718166662.jpeg"/></p><p style="border: 0px; margin-top: 0px; margin-bottom: 0px; padding: 10px 0px 20px; color: rgb(25, 25, 25); font-family: &quot;PingFang SC&quot;, Arial, 微软雅黑, 宋体, simsun, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);">如此的不情愿的心态，再加上水土不服，导致马丁内斯在广州恒大开始了一段不顺利之旅。2016赛季马丁内斯代表广州恒大出战各项赛事15次，仅仅打进4球，其中亚冠和超级杯颗粒无收，而球队由于马丁内斯在亚冠小组赛的低迷表现，也是提前两轮遭到淘汰，无缘卫冕。而在马丁内斯因伤缺阵的半个赛季里，广州恒大在斯科拉里的带领下豪取国内三冠王。</p><p style="border: 0px; margin-top: 0px; margin-bottom: 0px; padding: 10px 0px 20px; color: rgb(25, 25, 25); font-family: &quot;PingFang SC&quot;, Arial, 微软雅黑, 宋体, simsun, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);"><img src="/ueditor/php/upload/image/20171204/1512369719138532.jpeg"/></p><p style="border: 0px; margin-top: 0px; margin-bottom: 0px; padding: 10px 0px 20px; color: rgb(25, 25, 25); font-family: &quot;PingFang SC&quot;, Arial, 微软雅黑, 宋体, simsun, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);">而进入到2017赛季，马丁内斯由于脚踝频繁受伤，不仅错过了球队的冬训备战，而且更是无缘整个赛季的比赛。其实，马丁内斯是有望在今年夏季伤愈复出的，可是旧伤复发又不得不回到葡萄牙再手术治疗，导致广州恒大不得不从巴西请回穆里奇来填补离开的保利尼奥的外援名额。</p><p style="border: 0px; margin-top: 0px; margin-bottom: 0px; padding: 10px 0px 20px; color: rgb(25, 25, 25); font-family: &quot;PingFang SC&quot;, Arial, 微软雅黑, 宋体, simsun, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);"><img src="/ueditor/php/upload/image/20171204/1512369719118883.jpeg"/></p><p style="border: 0px; margin-top: 0px; margin-bottom: 0px; padding: 10px 0px 20px; color: rgb(25, 25, 25); font-family: &quot;PingFang SC&quot;, Arial, 微软雅黑, 宋体, simsun, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);">马丁内斯在中超联赛和广州恒大遭遇水土不服，除了自身伤病影响外，也跟他极其内向的性格有关。马丁内斯出生在一个贫穷家庭，所以这样环境也导致他性格内向，而来到中国这样一个陌生国度，自然会让他感到十分生疏。<span style="font-weight: 700; border: 0px; margin: 0px; padding: 0px;">此前，有广州媒体透露马丁内斯除了比赛日之外，他几乎完全消失在这座城市里，谁也没见过他和广州这座城市的交融。这也说明了马丁内斯喜欢自己生活，而不是很想去亲近其他人。</span></p><p style="border: 0px; margin-top: 0px; margin-bottom: 0px; padding: 10px 0px 20px; color: rgb(25, 25, 25); font-family: &quot;PingFang SC&quot;, Arial, 微软雅黑, 宋体, simsun, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);"><img src="/ueditor/php/upload/image/20171204/1512369719113177.jpeg"/></p><p style="border: 0px; margin-top: 0px; margin-bottom: 0px; padding: 10px 0px 20px; color: rgb(25, 25, 25); font-family: &quot;PingFang SC&quot;, Arial, 微软雅黑, 宋体, simsun, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);"><span style="font-weight: 700; border: 0px; margin: 0px; padding: 0px;">还有在球队中，马丁内斯由于性格太内向，让他不太喜欢跟高拉特、阿兰和保利尼奥等这样的巴西球员交流，再加上中文水平有限，就更谈不上跟中国球员交流了，这样也导致他在比赛中很难放开踢。</span>如今，马丁内斯正在加紧恢复当中，但是下赛季卡纳瓦罗是否会重用还成为疑问。不过，现在马丁内斯由于身价暴跌的变化，也让他成为了中超历史上性价比最低的外援，甚至被评价为中超最大水货外援也不为过。</p><p><br/></p>', 1512369748, '伏海星', 59, 26),
(6, '袁隆平：拟3年研发抗海水浓度0.6%、亩产三百公斤杂交稻', '袁隆平', '抗海水浓度0.6%、亩产三百公斤杂交稻', 'uploads/20171204101124698.jpg', '<p style="margin-top: 26px; margin-bottom: 0px; padding: 0px; line-height: 24px; color: rgb(51, 51, 51); text-align: justify; font-family: arial; white-space: normal; background-color: rgb(255, 255, 255);">2017年8月29日，中国工程院院士袁隆平来到山东即墨市即发金口农副业基地海水稻试验田察看水稻长势。视觉中国 资料</p><p style="margin-top: 22px; margin-bottom: 0px; padding: 0px; line-height: 24px; color: rgb(51, 51, 51); text-align: justify; font-family: arial; white-space: normal; background-color: rgb(255, 255, 255);">“‘确保国家粮食安全，把中国人的饭碗牢牢端在自己手中。’总书记讲到这一句时，我的内心格外激动！”现场聆听党的十九大报告后，今年87岁的袁隆平深感重任在肩，“我们从事农业科研的人，要勇于把确保粮食安全这副担子挑起来。”</p><p style="margin-top: 22px; margin-bottom: 0px; padding: 0px; line-height: 24px; color: rgb(51, 51, 51); text-align: justify; font-family: arial; white-space: normal; background-color: rgb(255, 255, 255);">悠悠万事，吃饭为大。在我们这样一个有着13亿多人口的大国，粮食安全问题在任何时候都不能放松。虽然我国农业已经连续十几年获得丰收，粮食产量连续4年超过6亿吨，但是越是粮食生产形势好的时候，越不能麻痹松懈。</p><p style="margin-top: 22px; margin-bottom: 0px; padding: 0px; line-height: 24px; color: rgb(51, 51, 51); text-align: justify; font-family: arial; white-space: normal; background-color: rgb(255, 255, 255);">水稻是国人重要的口粮，立足国内实现粮食基本自给，保证口粮绝对安全，离不开水稻产量的保障。所以，追求高产、更高产，是我们永恒的主题。从2000年到2016年，袁隆平领衔的团队共实现了大面积示范种植平均亩产700公斤、800公斤、900公斤、1000公斤、1067公斤的超级稻攻关五期目标。“科技无止境，下一步的目标就是研究出第三代杂交水稻，培育更高产、更优质、更高抗性的超级杂交稻。”</p><p style="margin-top: 22px; margin-bottom: 0px; padding: 0px; line-height: 24px; color: rgb(51, 51, 51); text-align: justify; font-family: arial; white-space: normal; background-color: rgb(255, 255, 255);">袁隆平还有一个目标是研究耐盐碱杂交水稻新品种，也就是人们通常所说的“海水杂交稻”。“‘海水杂交稻’的研发刚起步。我们计划通过3年时间，获得可抗海水浓度0.6%—1%、亩产达300公斤的‘海水杂交稻’品种。”</p><p style="margin-top: 22px; margin-bottom: 0px; padding: 0px; line-height: 24px; color: rgb(51, 51, 51); text-align: justify; font-family: arial; white-space: normal; background-color: rgb(255, 255, 255);">党的十九大报告提出“加快建设创新型国家”，这让袁隆平备受鼓舞：“科学研究的本色是创新，科学研究的使命是探索未知。我们科研工作者一方面要勇于创新、勇于探索、勇于突破，敢走别人没有走过的路，敢跳别人没有跳过的高度。另一方面也要脚踏实地，潜下心来搞科研、做学问。我常和身边的年轻人讲，想做好水稻研究，就要不管刮风下雨，每天都到田里去，把脚扎进稻田里。”</p><p style="margin-top: 22px; margin-bottom: 0px; padding: 0px; line-height: 24px; color: rgb(51, 51, 51); text-align: justify; font-family: arial; white-space: normal; background-color: rgb(255, 255, 255);">对于党的十九大报告提出的“要瞄准世界科技前沿，强化基础研究”，袁隆平表示：“我国的杂交水稻研究已走在世界前列，但我们不能躺在过去的功劳簿上。近年来国家对农业科研的投入一年比一年高，农业科研项目也逐年在增加，我们要抓紧时间，加倍努力工作，让水稻领域的科技成果真正造福国家、惠及百姓。”</p><p style="margin-top: 22px; margin-bottom: 0px; padding: 0px; line-height: 24px; color: rgb(51, 51, 51); text-align: justify; font-family: arial; white-space: normal; background-color: rgb(255, 255, 255);">党的十九大报告提出实施乡村振兴战略，并描绘出产业兴旺、生态宜居、乡风文明、治理有效、生活富裕的乡村振兴新蓝图。</p><p style="margin-top: 22px; margin-bottom: 0px; padding: 0px; line-height: 24px; color: rgb(51, 51, 51); text-align: justify; font-family: arial; white-space: normal; background-color: rgb(255, 255, 255);">谈起农业农村现代化，袁隆平认为：“过去一说农业就是面朝黄土背朝天，干农活儿是非常辛苦的，农村的生活也是相当艰苦的。现代农业不仅要实现机械化、电气化，还要实现规模化。这些年随着强农富农惠农政策的不断出台，农村发生了很大变化，不少贫困村摆脱了贫困，很多乡村水、电、路都通了，有了医务室，有些乡村还建设得像花园一样。漂亮的田园风光、完善的公共服务、能创业能干事的好环境，才能吸引更多人来到农村、从事农业，农村才能更有活力、大有希望。”</p><p style="margin-top: 22px; margin-bottom: 0px; padding: 0px; line-height: 24px; color: rgb(51, 51, 51); text-align: justify; font-family: arial; white-space: normal; background-color: rgb(255, 255, 255);">经过长期努力，中国特色社会主义进入了新时代。</p><p style="margin-top: 22px; margin-bottom: 0px; padding: 0px; line-height: 24px; color: rgb(51, 51, 51); text-align: justify; font-family: arial; white-space: normal; background-color: rgb(255, 255, 255);">“这个新时代，要求我们不断创造美好生活。”袁隆平说，“随着经济社会快速发展，消费者对农产品的需求越来越多元，我们的水稻品种也要相应调整。过去为解决温饱问题，主要追求产量，现在光吃饱不行，还要吃好，我们的目标转变成既要高产也要优质，两个标准都要很好落实。”</p><p style="margin-top: 22px; margin-bottom: 0px; padding: 0px; line-height: 24px; color: rgb(51, 51, 51); text-align: justify; font-family: arial; white-space: normal; background-color: rgb(255, 255, 255);">“这个新时代，中国日益走近世界舞台中央，要求我们不断为人类作出更大贡献。”袁隆平说，他一直有一个梦想，就是在全球推广杂交水稻种植。“世界上有一半以上的人口以稻米为主食，提高水稻产量，对保护世界粮食安全具有重要作用。全世界有22亿多亩水稻，如果世界上有一半稻田都种上了杂交稻，所增产的粮食，按平均每公顷增产两吨计算，可以多养活4亿至5亿人口，中国水稻将为人类的粮食安全作出贡献。我期待着中国的杂交水稻带给世界更多惊喜。”</p><p style="margin-top: 22px; margin-bottom: 0px; padding: 0px; line-height: 24px; color: rgb(51, 51, 51); text-align: justify; font-family: arial; white-space: normal; background-color: rgb(255, 255, 255);">（原题为《让中国水稻带给世界更多惊喜——访中国工程院院士袁隆平》）</p><p>111111111</p>', 1512353493, '段拓', 3, 26),
(9, '111111', '111', '111111', '', '<p>111</p>', 1512893549, '11', 4, 1);

-- --------------------------------------------------------

--
-- 表的结构 `blog_category`
--

CREATE TABLE IF NOT EXISTS `blog_category` (
  `cate_id` int(11) NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(50) NOT NULL DEFAULT '' COMMENT '//分类名称',
  `cate_title` varchar(255) NOT NULL DEFAULT '' COMMENT '//分类说明',
  `cate_keywords` varchar(255) NOT NULL DEFAULT '' COMMENT '//关键字',
  `cate_description` varchar(255) NOT NULL DEFAULT '' COMMENT '//描述',
  `cate_view` int(10) NOT NULL DEFAULT '0' COMMENT '//查看次数',
  `cate_order` tinyint(4) NOT NULL DEFAULT '0' COMMENT '//排序',
  `cate_pid` int(11) NOT NULL DEFAULT '0' COMMENT '//父级ID',
  PRIMARY KEY (`cate_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='文章分类' AUTO_INCREMENT=28 ;

--
-- 转存表中的数据 `blog_category`
--

INSERT INTO `blog_category` (`cate_id`, `cate_name`, `cate_title`, `cate_keywords`, `cate_description`, `cate_view`, `cate_order`, `cate_pid`) VALUES
(1, '新闻', '这里是新闻的标题这里是新闻的标题这里是新闻的标题', '国内最新最火爆的新闻', '发现身边事  身边物，有你有我有他', 6, 1, 0),
(2, '体育', '国足、男篮、女排、乒乓球', '', '', 0, 3, 0),
(3, '娱乐', '每个人都有自己的娱乐圈', '', '', 0, 2, 0),
(4, '新闻头条', '头条新闻_东方头条', '', '', 0, 1, 1),
(5, '军事新闻', '军事频道_最多军迷首选的军事门户_新浪网', '', '', 0, 2, 1),
(6, '体育新闻', '新浪体育_新浪网', '', '', 0, 3, 2),
(7, '体育彩票', '国家体育总局体育彩票管理中心官方网站', '', '', 0, 0, 2),
(8, '小刀娱乐网', '小刀娱乐网-免费资源分享平台,全网干货共分享-好东西不私藏!', '', '', 0, 0, 3),
(9, '娱乐之荒野食神', '娱乐之荒野食神 连载 最新章节官网第一时间更新 起点中文网', '', '', 0, 0, 3),
(25, '1111', '1111', '', '', 0, 4, 0),
(26, '222222', '2222', '', '', 1, 0, 25);

-- --------------------------------------------------------

--
-- 表的结构 `blog_config`
--

CREATE TABLE IF NOT EXISTS `blog_config` (
  `conf_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '配置ID',
  `conf_title` varchar(50) DEFAULT '' COMMENT '配置标题',
  `conf_name` varchar(50) DEFAULT '' COMMENT '变量名',
  `conf_content` text COMMENT '变量值',
  `conf_order` int(11) DEFAULT '0' COMMENT '排序',
  `conf_tips` varchar(255) DEFAULT '' COMMENT '描述',
  `field_type` varchar(50) DEFAULT '' COMMENT '字段类型',
  `field_value` varchar(255) DEFAULT '' COMMENT '类型值',
  PRIMARY KEY (`conf_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='网站配置表' AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `blog_config`
--

INSERT INTO `blog_config` (`conf_id`, `conf_title`, `conf_name`, `conf_content`, `conf_order`, `conf_tips`, `field_type`, `field_value`) VALUES
(1, '网站标题', 'web_title', 'DT-微博客', 1, '这里是网站配置项', 'input', ''),
(2, '统计代码', 'web_count', '1112223333', 2, '这里是网站统计配置项', 'textarea', ''),
(4, '网站状态', 'web_status', '1', 3, '这里是网站状态', 'radio', '1|开启,0|关闭'),
(5, '网站关键词', 'keywords', 'DT,博客,个人', 5, '这里是网站关键词', 'input', ''),
(6, '辅助标题', 'seo_title', '美丽的个人轻微博客', 4, '辅助标题做网站SEO推荐使用', 'input', ''),
(7, '描述', 'description', '你身边的专属个人微博系统', 6, '网站的简单描述', 'textarea', ''),
(8, '版权信息', 'copyright', 'Design By DT 微博客 <a href="http://{{$_SERVER[''SERVER_NAME'']}}">http://www.duantuo.com</a>', 7, '输入本网站的版权信息', 'textarea', '');

-- --------------------------------------------------------

--
-- 表的结构 `blog_links`
--

CREATE TABLE IF NOT EXISTS `blog_links` (
  `link_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '友情链接ID',
  `link_name` varchar(255) DEFAULT '' COMMENT '链接名称',
  `link_title` varchar(255) DEFAULT '' COMMENT '链接描述',
  `link_url` varchar(255) DEFAULT '' COMMENT '链接地址',
  `link_order` int(11) DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`link_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='友情链接表' AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `blog_links`
--

INSERT INTO `blog_links` (`link_id`, `link_name`, `link_title`, `link_url`, `link_order`) VALUES
(1, '百度', '百度一下你就知道', 'http://www.baidu.com', 1),
(2, '搜狗', '搜搜狗狗输入法', 'http://www.sogo.com', 2),
(4, '新浪微博', '发现新鲜的事', 'https://weibo.com/', 2),
(5, '腾讯网', 'qq  微信', 'http://www.qq.com/', 0),
(6, '知乎', '', 'https://www.zhihu.com/', 7),
(7, '点点', '', 'http://www.diandian.com/', 1);

-- --------------------------------------------------------

--
-- 表的结构 `blog_navs`
--

CREATE TABLE IF NOT EXISTS `blog_navs` (
  `nav_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '导航ID',
  `nav_name` varchar(50) DEFAULT '' COMMENT '名称',
  `nav_alias` varchar(50) DEFAULT '' COMMENT '别名',
  `nav_url` varchar(255) DEFAULT '' COMMENT '链接',
  `nav_order` int(11) DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`nav_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='导航栏表' AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `blog_navs`
--

INSERT INTO `blog_navs` (`nav_id`, `nav_name`, `nav_alias`, `nav_url`, `nav_order`) VALUES
(1, '首页', 'Protal', 'http://www.blog.com', 1),
(2, '关于我', 'About', 'http://', 2),
(3, '慢生活', 'Life', 'http://', 3),
(4, '碎言碎语', 'Doing', 'http://', 4),
(5, '模板分享', 'Share', 'http://', 5),
(6, '学无止境', 'Learn', 'http://', 6),
(7, '留言板', 'Gustbook', 'http://', 7);

-- --------------------------------------------------------

--
-- 表的结构 `blog_user`
--

CREATE TABLE IF NOT EXISTS `blog_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `user_name` varchar(50) NOT NULL COMMENT '用户名',
  `user_pass` varchar(255) NOT NULL COMMENT '用户密码',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='管理员' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `blog_user`
--

INSERT INTO `blog_user` (`user_id`, `user_name`, `user_pass`) VALUES
(1, 'admin', 'eyJpdiI6IktxYUliTkloQTFka2l6R0swbjJSZXc9PSIsInZhbHVlIjoiZjlBUW9kaVF6SVFVVDUxaHJhVVVIdz09IiwibWFjIjoiNjFmZmVmMmNkZTYwZmU1Zjg0MzZiNTA4N2E2ZDhmMDhmNGI1NzRjOWJiNjJhMTQwZDAyMWQ4YTRmZmZkYzYwZCJ9');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
