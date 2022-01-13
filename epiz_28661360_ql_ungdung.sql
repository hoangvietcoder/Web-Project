-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: sql304.epizy.com
-- Thời gian đã tạo: Th5 20, 2021 lúc 12:16 PM
-- Phiên bản máy phục vụ: 5.6.48-88.0
-- Phiên bản PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `epiz_28661360_ql_ungdung`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhgiasanpham`
--

CREATE TABLE `danhgiasanpham` (
  `id_danhgia` int(11) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `sosao` int(11) NOT NULL,
  `noidung` text COLLATE utf8_unicode_ci NOT NULL,
  `ngaydanhgia` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danhgiasanpham`
--

INSERT INTO `danhgiasanpham` (`id_danhgia`, `id_sanpham`, `id_user`, `sosao`, `noidung`, `ngaydanhgia`) VALUES
(1, 1, 1, 5, 'Rất hay. Mong đọc được nhiều truyện hơn từ phía tác giả. Khuyên mọi người nên đọc thêm.', '2021-05-14'),
(2, 1, 1, 4, 'Game chơi được.', '2021-05-14'),
(3, 1, 1, 5, 'Rất hay. Mong đọc được nhiều truyện hơn từ phía tác giả. Khuyên mọi người nên đọc thêm.', '2021-05-14'),
(4, 1, 1, 4, 'Game chơi được.', '2021-05-14'),
(5, 2, 1, 4, 'Rất tuyệt', '2021-05-02'),
(6, 2, 1, 3, 'Game chơi rất vui', '2021-05-09'),
(7, 3, 1, 5, 'Tuyệt vời', '2021-04-05'),
(8, 3, 1, 3, 'Game rất hay =))', '2021-02-16'),
(9, 4, 1, 2, 'Game rất tệ', '2020-11-17'),
(10, 4, 1, 1, 'Trải nghiệm rất tệ, không nên chơi', '2020-07-16'),
(11, 5, 1, 5, 'Nhờ ứng dụng mà tôi có thể kết nối với mọi người ', '2018-08-21'),
(12, 6, 1, 5, 'Một ứng dụng tuyệt vời', '2017-08-08'),
(13, 5, 1, 4, 'Ứng dụng khá hay, mọi người cần nên tải', '2021-01-29'),
(14, 7, 1, 3, 'Ứng dụng còn nhiều lỗi lặt vặt, cần khắc phục', '2018-12-11'),
(15, 7, 1, 2, 'Ứng dụng cực kì tệ', '2019-05-16'),
(16, 8, 1, 3, 'Sử dụng tạm được, cần thêm nhiều tính năng hơn', '2020-04-04'),
(17, 9, 1, 4, 'Ứng dụng sử dụng tốt, khuyên mọi người nên dùng thử', '2019-03-10'),
(18, 49, 1, 4, 'Rất tốt', '2021-05-19'),
(19, 49, 1, 5, 'Chơi quài không chán :))', '2021-05-19'),
(20, 1, 1, 5, 'Rating dạo ', '2021-05-19'),
(21, 6, 9, 5, 'Trải nghiệm tuyệt vời trong mùa Covid ', '2021-05-19'),
(22, 49, 13, 0, 'Game hay', '2021-05-20'),
(23, 49, 13, 3, 'Game hay', '2021-05-20'),
(24, 49, 13, 5, 'game ổn', '2021-05-20'),
(25, 6, 14, 5, 'Ứng dụng hay, giúp kết nối với bạn bè :)', '2021-05-20'),
(26, 27, 14, 5, 'Ứng dụng hay, giúp kết nối với bạn bè :)', '2021-05-20'),
(27, 25, 13, 4, 'hay', '2021-05-20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id_danhmuc` int(11) NOT NULL,
  `tendanhmuc` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id_danhmuc`, `tendanhmuc`) VALUES
(1, 'Game'),
(2, 'Mạng xã hội'),
(3, 'Văn phòng'),
(4, 'Mua sắm');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hinhanh_ungdung`
--

CREATE TABLE `hinhanh_ungdung` (
  `id_anh` int(11) NOT NULL,
  `id_ungdung` int(11) NOT NULL,
  `hinhanh` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichsunap`
--

CREATE TABLE `lichsunap` (
  `id_user` int(11) NOT NULL,
  `id_thecao` int(11) NOT NULL,
  `ngaynap` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id_product` int(11) NOT NULL,
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_developer` int(11) NOT NULL,
  `id_danhmuc` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `downloads` int(11) NOT NULL DEFAULT '0',
  `shortinfo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `detail` text COLLATE utf8_unicode_ci NOT NULL,
  `image_logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ngaydang` date NOT NULL,
  `state` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id_product`, `name`, `file`, `id_developer`, `id_danhmuc`, `price`, `downloads`, `shortinfo`, `detail`, `image_logo`, `ngaydang`, `state`) VALUES
(1, 'Multiplayer Kart Racing I', 'resources/files/app1.zip', 1, 1, '120000', 1, 'Become the fastest right now!!!', 'Race to the top and become the best kart racer in  <b>BOOM KARTS</b> - a fast paced online multiplayer PVP racing game! <br> <br> <b>REAL TIME ARCADE MULTIPLAYER RACING!</b> <br> Enter the world of Boom Karts and battle it out online against your friends and players from all around the world! Get behind the wheel and race around a variety of tracks in this arcade karting game. The races are in real time so you will always be right in the frantic action!<br><br><b>POWER UP YOUR GAME</b> <br>Perfect driving is not enough - take out the competition with a wide arsenal of bombs, soap bars, chili peppers and other crazy weapons and power-up items. Discover layer upon layer of playstyles and countermoves as you find new creative ways to ruin someone\'s race.<br><br><b>BATTLE YOUR FRIENDS ONLINE IN PVP MODE</b> <br>Create your own custom lobbies where you can pit your skills against your friends in frantic PVP kart races. In Boom Karts, you have control over your custom games. Easily create your lobby and choose which track you race on, how many laps, the amount of players and even which power ups will show up during the race! Take your karting to the next level! <br> <br> <b>CUSTOMIZABLE KARTS AND AVATARS!</b> <br>Create your own racer style by using a combination of outfits, accessories and kart skins. Choose from helmets, hats, t-shirts or a variety of other accessories to make your avatar stand out from the crowd then pick your favourite kart skin to race in. Unlock even more just by playing the game and opening chests. Find the driver style that suits you! <br> <br><b>DRIFT, BOOST and WIN!</b> <br>Master the art of drifting to become a pro racer! Charge up your boost by maintaining a long drift and activate a nitro boost that blasts you ahead of the competition. A skilled driver can use precise timing to deploy even more powerful boosts. <br> <br> <b>COLLECT and UNLOCK A VARIETY OF DIFFERENT KARTS!</b> <br>Collect blueprints to unlock new karts for you to race in! Each kart you unlock has different stats and upgrades. Which kart will be perfect for your driving style? Find your favorite kart by unlocking and driving them all! <br> <br> <b>GAME FEATURES</b> <br>Boom Karts is an action packed free-to-play arcade kart racing game - an online multiplayer racer that will keep you on the edge of your seat!', 'resources/images/app1.jpg', '2021-01-01', 'publish'),
(2, 'Lost Centuria', 'resources/files/app2.zip', 1, 1, '120000', 0, 'Tất Cả Trong Một Ván Đấu.⚔️Summoners War: Lost Centuria⚔️', '<b>⚔️ Một câu chuyện khác của Summoners War, tựa game đã làm say mê 100 triệu Nhà Hiệu Triệu </b> <br>- Hãy khám phá thế giới trước đó của Đảo Thiên Trường tại [Summoners War: Lost Centuria]! <br> <br> <b>⚔️ Gặp gỡ các Nhà Hiệu Triệu trên toàn thế giới qua những trận chiến thời gian thực!</b> <br>- Nội dung PvP nghẹt thở với những trận chiến thời gian thực và các pha hành động mãn nhãn! <br>- Hãy bắt đầu trận đấu đẳng cấp thế giới hướng đến ngôi vị số 1 toàn cầu. <br>- Đón nhận thử thách vươn đến cấp bậc cao nhất của Đấu Trường với những trận đấu và hành động mang tính chiến lược. <br> <br> <b>⚔️ Hành động chiến lược thời gian thực, nơi bạn áp đảo đối thủ bằng những màn counter khó lường</b> <br>- Tận hưởng sự thú vị khi trải nghiệm các trận đấu chiến lược và hành động qua nhiều nội dung PvP và PvE đa dạng! <br>- Giành lấy cơ hội chiến thắng bằng “Counter” đảo ngược cục diện trận đấu! <br>- Sử dụng Phép Bổ Trợ Nhà Hiệu Triệu chỉ có tại Lost Centuria. <br><br> ◇ Trang Chính Thức: https://summonerswar.com/LostCenturia <br>◇ Facebook Chính Thức: https://www.facebook.com/LostCenturia <br>◇ Youtube Chính Thức: https://www.youtube.com/c/SummonersWarLostCenturiaASEAN', 'resources/images/app2.jpg', '2021-01-01', 'publish'),
(3, 'FIFA Football', 'resources/files/app3.zip', 1, 1, '80000', 0, 'Build your Ultimate Team™ ', '<b>UEFA CHAMPIONS LEAGUE & EUROPA LEAGUE ?</b> <br>Kickoff against teams from club football’s most prestigious competitions – the UEFA Champions League and UEFA Europa League. Take part in playable live events that correspond with the real-world tournaments throughout the season to earn exclusive UCL and UEL Players. Follow every step, from the group stages all the way to the UEFA Champions League Final. <br> <br> <b>⚽ FOOTBALL ICONS ⚽</b> <br>Put your personal stamp on football’s history books! Build a team full of football legends, with 100 of the biggest ICONS from Pelé and Zidane to Maradona and Paolo Maldini. <br> <br> <b>ALL-NEW FEATURES THIS 2020-21 SEASON ALLOW YOU TO:</b> <br>✔️ Play as your favorite team for the first time ever in League Matchups <br>✔️ Complete weekly ICONS challenges to earn any of the 100 ICONS available now <br>✔️Dominate the best leagues in the world in all-new Seasons mode to put your Ultimate TeamTM on top. <br>✔️Face off for top spot on the leaderboards weekly in Division Rivals’ brand-new Weekend Tournament <br>✔️More ways to turn real football activity into in-game rewards plus unlock an exclusive 84 OVR João Félix item when you connect your adidas GMR to the new Season', 'resources/images/app3.jpg', '2021-01-01', 'publish'),
(4, 'The Walking Zombie 2', 'resources/files/app4.zip', 1, 1, '150000', 0, 'ZOMBIE KÌA!! Thế giới sau ngày tận thế zombie là một nơi vô cùng khắc nghiệt. ', '<b>GAME NHẬP VAI SINH TỒN VÀ BẮN SÚNG GÓC NHÌN THỨ NHẤT</b> <br>Walking Zombie 2 là một tựa game bắn súng góc nhìn thứ nhất truyền thống có cốt truyện, với vô số nhiệm vụ và rất nhiều loại súng cũng như vũ khí khác nhau. Đây cũng là một tựa game mà bạn có thể chơi ngoại tuyến mà không cần kết nối internet. Kẻ thù chính của bạn là những thây ma đang kiểm soát thế giới. Chúng ở khắp mọi nơi, với nhiều loại khác nhau và quan trọng nhất là số lượng khổng lồ. Bạn sẽ sử dụng súng cùng các loại đạn, lựu đạn hoặc vũ khí cận chiến đa dạng để kết liễu chúng. Đồng thời, bạn có thể tự chữa lành vết thương bằng hộp sơ cứu và thức ăn. Hoàn thành càng nhiều nhiệm vụ, nhân vật của bạn càng trở nên mạnh mẽ hơn với trang bị tốt hơn, kỹ năng nâng cao và lĩnh hội các năng lực. Liệu bạn có thể tăng mức sinh lực, tăng xác suất phá khóa thành công hay giảm mức tiêu thụ nhiên liệu khi lái xe trên bản đồ thế giới không? Bạn sẽ làm gì để ngăn chặn thảm họa thây ma trên thế giới? <br><br> <b>TÍNH NĂNG</b> <br>*Game bắn súng góc nhìn thứ nhất bối cảnh hậu tận thế kiểu truyền thống <br>*Phong cách đồ họa đa giác hiện đại bắt mắt <br>*Hệ thống Nghiệp - các hành vi tốt và xấu sẽ tạo ra các tùy chọn mới và đối mặt với những đối tượng mới <br>*Cốt truyện đa dạng và nhiều nhiệm vụ phụ <br>*Nhiều vũ khí, trang bị bảo vệ và các thiết bị khác - hãy tự thành lập biệt đội sinh tồn của riêng bạn <br>*Tựa game sinh tồn ngoại tuyến <br>*Chế tạo và xây dựng tùy ý trong phần thế giới mở của trò chơi <br>*Trang trí vũ khí <br><br>\r\n<b>TỰA GAME BẮN ZOMBIE 3D KHÔNG NGỪNG MỞ RỘNG</b> <br>Chúng tôi vẫn đang làm việc chăm chỉ để tạo ra nội dung mới cho trò chơi. Không chỉ bổ sung cốt truyện mới để bạn khám phá chiến trường zombie nguy hiểm này mà còn nỗ lực để thế giới trở nên tốt đẹp hơn và đáng sống hơn. Chúng tôi đang nghiên cứu các cơ chế mới để bạn có thể chế tạo những vật dụng phục vụ sinh tồn như khí ga và đạn dược trên bàn chế tạo trong những ngôi nhà mà bạn mua. Ngoài ra, mục tiêu của bạn không chỉ là thây ma vì hành vi của bạn có thể khiến những người sống sót thù hận - lũ cướp, những chính trị gia suy đồi, các giáo phái, băng đảng, v.v. Thời đại zombie vẫn tiếp diễn nhưng với các công cụ mới trong kho vũ khí của mình, bạn sẽ sống sót!\r\n', 'resources/images/app4.jpg', '2021-01-01', 'publish'),
(5, 'TikTok Lite', 'resources/files/app5.zip', 1, 2, '0', 100, 'TikTok là mạng xã hội cực HOT về video ', 'Bất kể là nhảy, múa, phong cách tự do hay biểu diễn tài năng, người dùng được khuyến khích để cho trí tưởng tượng bay cao bay xa và mặc sức thể hiện cá tính của mình. Được thiết kế cho thế hệ người trẻ yêu thích âm nhạc và sáng tạo, TikTok cho phép người dùng dễ dàng và nhanh chóng tạo các video ngắn độc đáo để chia sẻ với bạn bè và giới trẻ trên toàn thế giới. TikTok là chuẩn mực mạng xã hội video mới cho giới trẻ năng động sáng tạo. Chúng tôi nỗ lực giúp các bộ óc sáng tạo có thể trở thành một phần của cuộc cách mạng nội dung. <br><br>[Nhận diện khuôn mặt]<br>Quay phim tốc độ cao với tính năng nhận diện khuôn mặt hoàn hảo dễ dàng ghi lại mọi biểu cảm phong phú của bạn cùng với những sticker vô cùng độc đáo. <br><br>[Chất lượng sắc nét] <br>Tải về ngay lập tức, giao diện trơn tru và không giật lag. <br>Mọi chi tiết được hiển thị với chất lượng hoàn hảo. <br><br>[Studio di động] <br>Sự kết hợp hoàn hảo giữa trí thông minh nhân tạo và tính năng ghi hình. <br>Tính năng đồng bộ giai điệu, các hiệu ứng đặc biệt và công nghệ tiên tiến. <br>Hô biến chiếc điện thoại của bạn thành một studio tại gia đầy sáng tạo!\r\n', 'resources/images/app5.jpg', '2021-01-01', 'publish'),
(6, 'Facebook Lite', 'resources/files/app6.zip', 1, 2, '0', 202, 'Giữ liên lạc với bạn bè nhanh hơn bao giờ hết. Facebook là ứng dụng miễn phí và sẽ luôn như vậy.', '<b>Giới thiệu về Facebook:</b> <br>• Nhắn tin cho bạn bè và tham gia các cuộc trò chuyện nhóm <br>• Nhận thông báo khi bạn bè thích và bình luận về bài viết của bạn <br>• Xem bạn bè đang làm gì <br>• Chia sẻ thông tin cập nhật và ảnh <br>• Mua và bán tại địa phương trên Facebook Marketplace <br> <br>Hiện tại, bạn có thể dễ dàng tiếp cận phiên bản tiếp theo của Facebook Lite bằng cách trở thành một người thử nghiệm beta. Đăng ký tại đây: https://play.google.com/apps/testing/com.facebook.lite', 'resources/images/app6.jpg', '2021-01-01', 'publish'),
(7, 'Lazada Mua Gì Cũng Có', 'resources/files/app7.zip', 1, 4, '0', 0, 'Chào mừng đến với Lazada – Săn hot voucher mỗi ngày\r\n', '<b>NHẬN ƯU ĐÃI MỖI NGÀY </b> <br>- Giá hủy diệt mỗi ngày cùng Flash Sale, siêu deal 1đ, voucher 10K không giới hạn<br>- Rẻ vô đối, ngàn deal 49K, chỉ trên app <br><br><b>LAZADA MUA GÌ CŨNG CÓ, MIỄN PHÍ GIAO HÀNG 0Đ</b><br>- Hàng triệu sản phẩm đa dạng ngành hàng được làm mới mỗi ngày<br>- Nhận ngay voucher vận chuyển 20K-40K không giới hạn <br><br><b>AN TÂM VỀ CHẤT LƯỢNG  </b><br>Nhận thông báo ưu đãi độc quyền trên ứng dụng mỗi ngày <br>-Trò chuyện trực truyến cùng nhà bán hàng <br>-Cá nhân hóa trải nghiệm với sản phẩm, thương hiệu bạn yêu thích \r\n', 'resources/images/app7.jpg', '2021-01-01', 'publish'),
(8, 'Messenger Lite', 'resources/files/app8.zip', 1, 2, '0', 150, 'Ứng dụng nhắn tin nhanh và tiết kiệm dữ liệu hỗ trợ bạn liên hệ với mọi người trong cuộc sống của mì', '- Cài đặt nhanh. Kích thước tải xuống: chưa đến 10MB! <br>- Tiết kiệm dữ liệu. Ứng dụng tải nhanh, chạy hiệu quả và sử dụng ít dữ liệu di động hơn.<br>- Hoạt động ở mọi nơi. Liên hệ với mọi người khi bạn ở khu vực có kết nối Internet chậm hoặc không ổn định.<br>- Liên hệ với bất kỳ ai trên Messenger, Facebook hoặc Facebook Lite.<br>- Xem khi mọi người đang hoạt động và có thể chat.<br>- Nhắn tin trực tiếp cho mọi người hoặc trong nhóm để cập nhật hoặc lập kế hoạch.<br>- Gửi ảnh, liên kết hoặc thể hiện bản thân bằng nhãn dán.<br>- Gọi thoại và video trực tiếp miễn phí qua Wi-Fi (nếu không, bạn sẽ bị tính cước dữ liệu chuẩn). Nói chuyện bao lâu tùy ý, ngay cả với những người ở các quốc gia khác!', 'resources/images/app8.jpg', '2021-01-01', 'publish'),
(9, 'Adobe Lightroom', 'resources/files/app9.zip', 1, 3, '180000', 0, 'Adobe Photoshop Lightroom là app chỉnh sửa ảnh miễn phí, mạnh mẽ', '• CÀI ĐẶT SẴN: Thực hiện được nhiều thay đổi với trình chỉnh sửa ảnh một chạm của chúng tôi <br> • HỒ SƠ: Sử dụng các hiệu ứng ảnh tuyệt diệu một chạm để thực hiện những thay đổi nổi bật <br>• ĐƯỜNG CONG: Các chỉnh sửa nâng cao thay đổi màu sắc, độ phơi sáng, tông màu và độ tương phản <br>• CHỈNH SỬA MÀU: Điều chỉnh và tinh chỉnh màu ảnh bằng bộ trộn màu. Kiểm soát được nhiều hơn nhờ khả năng phân loại màu nâng cao và đạt được hiệu ứng tuyệt đẹp<br>• ĐỘ RÕ NÉT, KẾT CẤU VÀ DEHAZE: Sửa ảnh bằng các công cụ biên tập hình ảnh hàng đầu<br>• PHIÊN BẢN: Thử nghiệm và so sánh các bản chỉnh sửa mà không làm mất đi bản gốc<br>• HƯỚNG DẪN TƯƠNG TÁC: Lấy cảm hứng từ các bài học hướng dẫn của các nhiếp ảnh gia<br>• CỘNG ĐỒNG: Lấy cảm hứng từ các tài sản sáng tạo khác trong app chỉnh sửa ảnh Lightroom với nội dung được cá nhân hóa, cài đặt sẵn miễn phí và khả năng theo dõi các tác giả mà bạn yêu thích<br>• CAMERA CHUYÊN NGHIỆP: Khai thác tiềm năng chụp ảnh đẹp của điện thoại bằng các chế độ kiểm soát độc đáo. Bạn được lựa chọn từ phơi sáng, hẹn giờ, cài đặt trước tức thì và nhiều chức năng khác', 'resources/images/app9.jpg', '2021-01-01', 'publish'),
(10, 'Adobe Photoshop Express', 'resources/files/app10.zip', 1, 3, '250000', 1, 'Sáng tạo trên từng cây số với Photoshop Express – tiêu chuẩn chỉnh sửa ảnh nhanh chóng và dễ dàng', 'CHỈNH SỬA PHỐI CẢNH <br>• Sửa ảnh bị cong tức thì với Thiết đặt tự động.<br>• Sửa góc chụp hỏng với Công cụ biến đổi. <br>\r\n<br>LOẠI BỎ NHIỄU <br>• Làm mịn ảnh nhiễu hoặc Giảm Độ nhiễu màu, cho hình ảnh trong như pha lê.<br>• Làm nét các chi tiết để ảnh trông được đẹp nhất. <br><br>ÁP DỤNG LÀM MỜ <br>• Chuyển trọng tâm lấy nét sang các chi tiết cụ thể và hòa trộn nền bằng tính năng Mờ xuyên tâm. <br>• Nâng cao hình ảnh và tạo chuyển động với tính năng Mờ toàn màn hình.<br><br>THÊM ĐƯỜNG BAO QUANH VÀ VĂN BẢN <br>• Tùy chỉnh hình dán, ảnh chế và phụ đề theo ý thích cá nhân riêng của bạn.<br>• Tạo phong cách cho thông điệp của bạn với một loạt điều chỉnh về phông chữ, màu sắc và độ mờ.<br>• Tạo cảm hứng với đường bao quanh hợp màu ảnh hoặc chọn loại khung tùy chỉnh độc đáo.<br>• Tinh chỉnh vị trí văn bản với cài đặt dịch chuyển, thu phóng và xoay.', 'resources/images/app10.jpg', '2021-01-01', 'publish'),
(11, 'HAGO ', 'resources/files/app11.zip', 1, 2, '0', 99, 'HAGO là một nền tảng ứng dụng xã hội hội tụ tất cả-trong-một', '<b>PHÁT TRỰC TIẾP LIÊN TỤC</b> <br>● Hãy thưởng thức những buổi hòa nhạc trực tiếp, các màn trình diễn khiêu vũ sống động, những vở hài kịch độc thoại vui nhộn, nhiều cuộc thi đấu thể thao điện tử rất thú vị và còn vô số buổi biểu diễn tuyệt vời khác được diễn ra 24/7! <br>●Nếu bạn là một người yêu thích khiêu vũ hay bạn là một ca sĩ xuất sắc, thì đừng ngần ngại hãy phát trực tiếp và cho cả thế giới biết bạn có những gì!<br>●Vô số người phát tường thuật trực tiếp (streamer) xuất sắc đã trở thành những siêu sao trên HAGO. Bạn có thể trở thành một trong số họ! Đến với Hago – Bạn sẽ được nổi tiếng và có được thu nhập cao đáng mơ ước! <br>Hãy cổ vũ các streamer bằng cách mang đến cho họ một số món quà bất ngờ và thú vị của chúng ta!<br> Bạn có bất cứ tài năng nào muốn cho cả thế giới thấy không? Hãy tham gia HAGO ngay lúc này và trở thành một streamer đình đám tiếp theo! <br><br><b>CHIA SẺ NHỮNG KHOẢNH KHẮC ĐẶC BIỆT</b> <br>● Chia sẻ các khoảnh khắc đặc biệt trong cuộc sống của bạn trên Square! Bạn sẽ tìm thấy nhiều người có những sở thích đa dạng. Hãy chào hỏi và kết bạn mới!<br>● Các trận đấu ngẫu nhiên và phù hợp sẵn sàng giúp bạn tìm kiếm thêm nhiều bạn bè và dễ dàng phá vỡ các kỷ lục! <br>●Còn chần chừ gì nữa? Hãy tải ứng dụng và bắt đầu chia sẻ ngay nhé! \r\n', 'resources/images/app11.jpg', '2021-01-01', 'publish'),
(12, 'CapCut', 'resources/files/app12.zip', 1, 3, '0', 0, 'CapCut is a free all-in-one video editing app that helps you create incredible videos.', '「Easy to use」<br>Cut, reverse and change speed: getting it just right is easier than ever，Posting only your wonderful moments. <br><br>「High quality」<br>Advanced filters and flawless beauty effects open up a world of possibilities <br><br>「Top Music Hits/Sounding incredible」<br>Tremendous music library and exclusive copyright songs<br><br>「Stickers and text」<br>Top trending stickers and fonts let you fully express your videos <br><br>「Effect」<br>Get creative with a range of magical effects', 'resources/images/app12.jpg', '2021-01-01', 'publish'),
(13, 'Shopee: Mua Sắm Online #1', 'resources/files/app13.zip', 1, 4, '0', 0, 'Chào mừng đến SHOPEE - điểm đến cho mọi nhu cầu mua sắm, bán hàng và giải trí.', 'MUA SẮM ONLINE NHANH CHÓNG MỌI LÚC, MỌI NƠI\r\n<br>● Dễ dàng tìm kiếm sản phẩm chất lượng với giá tốt nhất từ lượng hàng phong phú trong và ngoài nước. Bên cạnh sản phẩm tiêu dùng, bạn còn có thể mua voucher dịch vụ, nạp tiền điện thoại và đặt ship đồ ăn nhanh NowFood.\r\n<br>● An tâm mua sắm từ các shop bán hàng uy tín được người mua đánh giá và bình chọn. Đặc biệt, khi mua sắm trong mục Shopee Mall, bạn sẽ được đảm bảo hàng chính hãng 100% hoặc hoàn tiền gấp đôi.\r\n<br>● Thoải mái đặt ship hàng đến bất cứ đâu trong Việt Nam. Shopee đang liên kết với các đơn vị vận chuyển hàng uy tín như Giao Hàng Nhanh, Giao Hàng Tiết Kiệm,… để sản phẩm được giao tận nơi người nhận nhanh nhất có thể.\r\n<br><br>TẬN HƯỞNG KHUYẾN MÃI ĐỘC QUYỀN VÀ MIỄN PHÍ GIAO HÀNG TOÀN QUỐC\r\n<br>● Miễn phí khi tạo tài khoản Shopee. Một tài khoản có thể sử dụng cho cả việc mua sắm và bán hàng online\r\n<br>● Nhận ngay một món quà xịn xò khi bạn mua hàng lần đầu trên Shopee\r\n<br>● Tận hưởng thời gian vui vẻ cùng bạn bè và người thân khi tham gia các trò chơi của Shopee. Đồng thời, nhận đến hàng triệu Shopee Xu mỗi tháng. Với 1 Xu, bạn sẽ được hoàn 1 VND khi mua sắm tại Shopee.\r\n<br>● Mua hàng online cực tiết kiệm với Flash Sale 1K, deals giá Rẻ Vô Địch, Mã giảm giá và Mã miễn phí giao hàng toàn quốc\r\n<br><br>THANH TOÁN GIAO DỊCH ĐƠN GIẢN\r\n<br>Thuận tiện mua sắm online trên Shopee với phương thức thanh toán đa dạng. Bạn có thể thanh toán khi nhận hàng (COD), thanh toán online qua liên kết ngân hàng hoặc bằng ví điện tử Airpay.', 'resources/images/app13.jpg\r\n', '2021-01-01', 'publish'),
(14, 'Candy Crush Soda Saga', 'resources/files/app14.zip', 1, 1, '0', 0, 'Download Candy Crush Soda Saga now!', 'From the makers of the legendary Candy Crush Saga comes Candy Crush Soda Saga! Unique candies, more divine matching combinations and challenging game modes brimming with purple soda and fun!<br><br>\r\nThis mouth-watering puzzle adventure will instantly quench your thirst for fun. Join Kimmy on her juicy journey to find Tiffi, by switching and matching your way through new dimensions of magical gameplay. Take on this Sodalicious Saga alone or play with friends to see who can get the highest score!<br><br>Show your competitive side in the Episode Race! Compete against other players to see who can complete levels the fastest and progress the quickest. Or work as a team in the Social Bingo feature where players work together for Sodalicious rewards!', 'resources/images/app14.jpg', '2021-01-01', 'publish'),
(15, 'MARVEL Realm of Champions', 'resources/files/app15.zip', 1, 1, '0', 0, 'High-action Marvel multiplayer mayhem for your mobile device!', 'Join this bold new imagining of the Marvel Universe, gear up your Champions and play your part in this epic real-time Action-RPG brawl!<br><br>Customize your Marvel Champions with weapons and gear.<br><br>Then team up with your network of friends in real-time high-action team-based battles.<br><br>Tank with your Hulk, Super Soldier and Thor to soak up hits while you attack hard with area disruption.<br><br>Inflict devastating damage at close range with your Black Panther. Use high-powered ranged attacks with your Web Warrior and Iron Legionnaire.<br><br>Amplify your allies with your Storm and Sorcerer Supreme dealing bursts of damage to vanquish groups of enemies.\r\n', 'resources/images/app15.jpg', '2021-01-01', 'publish'),
(16, 'Animal Restaurant', 'resources/files/app16.zip', 1, 1, '0', 0, 'Game mô phỏng kinh doanh ấm áp, câu chuyện bắt đầu từ chú mèo đi lạc trong rừng.', 'Bạn là chủ của một Nhà Hàng Thú Cưng, bạn sẽ thu nhận chú mèo ngốc nghếch bẩn thỉu này làm việc trong nhà hàng của bạn không?<br><br>Bạn có thể học các món ăn,<br>Bánh Cá Taiyaki, Bánh Kếp Dâu Tây, Kem Đá Bào, Mì Ý!<br>Thậm chí còn có Lẩu, Mì Ốc!<br><br>Nội thất phối hợp các kiểu phong cách,<br>Bàn tráng miệng kiểu Âu, hàng rào kiểu Nhật, lò nướng phong cách Địa Trung Hải!<br>Bạn cũng có thể tổ chức một buổi trà chiều theo phong cách Alice!<br><br>Chỉ cần chăm chỉ kinh doanh, khách hàng sẽ đến nườm nượp.<br>Bạn sẽ nói chuyện với những vị thực khách kiểu gì cũng có này chứ?<br>Bạn sẵn lòng lắng nghe tiếng lòng của họ, hay là cãi nhau với họ?<br>Thông qua trò chuyện, thư từ để hiểu về những câu chuyện đằng sau khách hàng, thậm chí có thể tham gia vào, thay đổi cuộc đời của họ<br><br>Tất cả những thứ này đều thuộc về Nhà Hàng Thú Cưng vốn không hào nhoáng, nhưng đầy sự ấm áp đáng yêu và chỉ thuộc về bạn\r\n', 'resources/images/app16.jpg', '2021-01-01', 'publish'),
(17, 'Fire Emergency Manager', 'resources/files/app17.zip', 1, 1, '0', 0, 'Will you be able to manage a fire station and become the firefighter tycoon?', 'Take control of emergency units, incident telephone calls, save lives, and much more. Handle the needs of your facility and make appropriate decisions to expand your business and improve the responsiveness of your area: customize your headquarters, expand parking spaces for fire trucks and fuel trucks; buy new and better fire trucks, install fire alarms, improve fire-retardant equipment for staff, or install new fire hydrants near important urban buildings. Each choice you make will have an impact on your development strategy! - Enjoy the dangerous adventure and challenge the different missions!<br><br>Expand your fire station office and increase productivity with firefighters who will automate the workflow of your city! - Online and Offline mode! Discover the manager\'s business strategy to invest in and earn as much cash as possible in this idle tycoon simulator - Live as a captain of a firefighter group! Make more money in this firefighter simulator until you become a rich manager tycoon! This is not a clicker game: no need for endless tapping like other idle simulators.', 'resources/images/app17.jpg', '2021-01-01', 'publish'),
(18, 'Ronin: The Last Samurai', 'resources/files/app18.zip', 1, 1, '0', 0, 'Era of doom. One warrior survives, and faces death of the Shogun.', 'Caution! Ronin: The Last Samurai is free to download and play, but some in-game items can be purchased with real money. If you do not want to use this feature, please block in-app purchases in device settings. Additionally, in accordance with the Terms of Use and Privacy Policy, you must be at least 15 years old to play the game and an internet connection is required.<br><br>[App Permissions Guide]<br>When playing the game, we request app permissions to provide the following services. If you do not allow mandatory app permissions, you will not be able to play the game.<br><br>● Mandatory app permissions<br>-Photo/Media/File: Required to store game files and data. Rest assured that we do not access any of your photos and files.<br><br>● How to deny app permissions<br>-Android 6.0 or higher: Settings> Apps> Select App Permission> App Permissions List> Select Deny app permission.<br>-Android 6.0 or lower: Upgrade the operating system to deny app permissions or delete apps', 'resources/images/app18.jpg', '2021-01-01', 'publish'),
(19, 'Hello Kitty Friends', 'resources/files/app19.zip', 1, 1, '0', 1, 'Leading interactive entertainment company for the mobile world.', 'My coy but lovely friend, \'KUROMI\', finally came to Hello Kitty Friends World! Welcome a cute friend the pink skull hood!<br><br>World-famous HELLO KITTY, MY MELODY, POMPOMPURIN, BAD BADTZ-MARU, KEROKEROKEROPPI, TUXEDOSAM go to the puzzle world!<br>Exciting puzzle game adventure with cute Sanrio characters!\r\n<br><br>Tap blocks of same Friends blocks and craft powerful booster!<br>Explore Hello Kitty Friends’ world with cute obstacles in your way!<br><br>What should I wear today?<br> Collect a variety of costumes for the Friends.<br>GUDETAMA and CINNAMOROLL also visited the Hello Kitty Friends world!<br>Charming Friends will help you play the game!\r\n', 'resources/images/app19.jpg', '2021-01-01', 'publish'),
(20, 'Clusterduck', 'resources/files/app20.zip', 1, 1, '0', 0, 'What came first, the duck or the egg?', 'CLUSTERDUCK is about hatching as many ducks as possible. As more ducks hatch, the more strange things happen. The ducks begin to genetically mutate! With each generation of ducks that hatch, the chances of things going horribly wrong increase at an alarming rate. Ever seen a duck with a sword for a head, or horse hoof for a wing? These ducks have gone absolutely bonkers.<br><br>Need room for more ducks? Sacrifice ducks down *the hole*. But don’t get too close — you don’t know what’s lurking down there.<br><br>Features:\r\n<br>•Hatch and mutate wacky ducks!\r\n<br>•Collect hundreds of head, wing, and body variations, resulting in amazing varieties!\r\n<br>•Mutations come in common, rare, epic, and legendary rarities!\r\n<br>•Witty duck descriptions introduce you to the personality quirks of each duck\r\n<br>•Discover the secrets of *the hole*', 'resources/images/app20.jpg', '2021-01-01', 'publish'),
(21, 'Moto Rider GO: Highway Traffic', 'resources/files/app21.zip', 1, 1, '100000', 0, 'Moto Rider GO: Highway Traffic brings to you one of the most compelling', 'Features:\r\n<br>- Choose from the fastest high-performance motorcycles!\r\n<br>- Enjoy extreme 3D visuals!\r\n<br>- Prove your skills in hardcore challenges!\r\n<br>- Upgrade your speed, breaking level and add extra lives!\r\n<br>- Select your favorite motorbike category: chopper, cross or superbike!\r\n<br>- Make near traffic misses discovering 4 unique locations: Suburbs, Desert, Snow and Night City\r\n<br>- Explore 4 unique locations in 4 different modes!\r\n<br>- Ride your motorcycle on a highway, interstate, or the autobahn!\r\n<br>- Dominate online leaderboards!\r\n<br>- Unlock 23 achievements!\r\n<br>- Discover plenty of bike tuning options!\r\n<br><br>ENDLESS GAMEPLAY<br>Head out and race as fast as you can to become the best new moto rider in the world! Race the traffic and complete the challenges to get real among the competition. Jump on your racing bike and ride in the endless busy roads and highways! Make near traffic misses discovering 4 unique locations: Suburbs, Desert, Snow and Night City in 4 different modes! Ride your motorcycle on a highway, interstate, or the autobahn. Never forget that riding a motorcycle can be fun, but it can also be dangerous! Roads and highways are full of speeding cars – they can bother you!<br><br>SELECTION OF HIGH-PERFORMANCE MOTORBIKES<br>Have you ever wanted to ride a motorcycle in real life? Great! It\'s about time to test your skills and decide on the motorcycle category you would choose – extremely fast superbike, epic chopper motorcycles or modified high-performance versions of off-road motorcycles! Every bike has its own individual extras: total lives, near miss bonus, high-speed bonus or wrong way bonus.\r\n', 'resources/images/app21.jpg', '2021-01-01', 'publish'),
(22, 'Twitter', 'resources/files/app22.zip', 1, 2, '0', 199, 'Join the conversation!', 'Expand your social network and stay updated on what’s trending now. Retweet, chime in on a thread, go viral, or just scroll through the Twitter timeline to stay on top of what’s happening, whether it’s social media news or news from around the world.<br><br>Twitter is your ✨ go-to social media app ✨ and the new media source for what\'s going on around the globe, straight from the accounts of the influential people who affect your world day-to-day.<br><br>Explore top trending topics in media, or get to know thought-leaders in the areas that matter to you; whether your interests range from celebrity tweets to politics, news updates or football, you can follow & speak directly to influencers or your friends alike. Every voice can impact the world.<br><br>Follow your interests. ⭐ Tweet, Fleet, Retweet, Reply to Tweets, Share or Like - Twitter is the #1 social media app for latest news & updates.<br><br>Trending Topics Get ready for a new kind of media. Search hashtags and trending topics to stay in the know. Follow the tweets of your favourite influencers, alongside hundreds of interesting Twitter users, and read their content at a glance.', 'resources/images/app22.jpg', '2021-01-01', 'publish'),
(23, 'Lotus - Mạng Xã Hội', 'resources/files/app23.zip', 1, 2, '0', 0, 'Lotus là mạng xã hội do người Việt phát triển', 'Kết nối, chia sẻ, bàn luận cùng những cộng đồng có chung sở thích.\r\n<br>Trở thành ngôi sao sáng tạo nội dung dễ dàng với công cụ sẵn có.\r\n<br>Mua bán các mặt hàng.\r\n<br>Tương tác và cổ vũ cho idol của mình.\r\n<br>Không bỏ lỡ những tin tức hot nhất trong xã hội\r\n<br>Hay đơn giản chỉ là chia sẻ những bản nhạc, tập truyện, bộ phim yêu thích.\r\n<br>Trên Lotus, bạn sẽ tìm được mọi thứ thoả mãn nhu cầu của mình.\r\n<br><br>- Kết nối và chia sẻ cảm xúc theo cách mà bạn muốn:\r\n<br>+ Đăng bài viết dạng ảnh với tính năng Photo status - giúp bức ảnh chứa đựng nhiều cảm xúc hơn.\r\n<br>+ Viết blog, quote, ghi chú trên mạng xã hội với tính năng Rich Media.\r\n<br>+ Bày tỏ cảm xúc thông qua bộ reaction chỉ có tại Lotus.\r\n<br><br>- Giữ liên lạc với thế giới xung quanh bạn: Đọc - xem tin - giải trí kiểu mới:\r\n<br>+ Cập nhật tin tức nhanh và hot nhất với 50+ đầu báo top đầu.\r\n<br>+ Không bỏ lỡ 1 tin tức nào với mục Trending news, cập nhật luật mới được ban hành, dự báo thời tiết, bảng xếp hạng bóng đá, tỷ giá vàng, ngoại tệ, xăng dầu...\r\n<br>+ Chỉ cần dành 1 phút để nắm trọn tin tức với tính năng \"xem\" tin tức định dạng video mutex.\r\n<br>+ Giải trí trên Lotus bằng loạt nội dung hấp dẫn đến từ các nhà sản xuất nội dung chuyên nghiệp & creators bạn yêu thích.', 'resources/images/app23.jpg', '2021-01-01', 'publish'),
(24, 'MyClip - Mạng xã hội Video', 'resources/files/app24.zip', 1, 2, '0', 0, 'MyClip là mạng xã hội Video của Việt Nam', 'MyClip có 5 tính năng hay:<br><br>1> 100% lưu lượng Data 3G/4G tốc độ cao Viettel\r\n<br>2> Video, Clip đặc sắc hiện nay: Bóng đá, Premier League, Laliga, BuldesLiga, AFF Cup, U23 Việt Nam, 2018, Hài Kem Xôi, Hài Mỳ Gõ, FapTV, hài Nghếu, trailer Phim bom tấn, clip gái xinh HD… được người dùng chia sẻ thường xuyên liên tục\r\n<br>3> Sự kiện âm nhạc đặc sắc\r\n<br>4> Đăng tải và chia sẻ video với bạn bè liên tục, không lo mất phí Data 3G/4G tốc độ cao.\r\n<br>5> Tạo thu nhập khủng cho người dùng đăng tải video.', 'resources/images/app24.jpg', '2021-01-01', 'publish'),
(25, 'Tinder', 'resources/files/app25.zip', 1, 2, '0', 162, 'Tinder – một phương thức mới mẻ để gặp gỡ mọi người', 'Kết bạn, hẹn hò, tìm người yêu hay gần như thế. Hẹn hò vui vẻ, kết bạn hay nghiêm túc tìm người yêu - Tinder luôn có thứ bạn cần!<br><br>► Tự hào se duyên 26 triệu lượt tương hợp mỗi ngày và hơn 20 tỷ lượt tương hợp đến nay!<br>► Tinder không chỉ đơn giản là ứng dụng hẹn hò — với người dùng đến từ trên 190 quốc gia, Tinder là ứng dụng giao tiếp phổ biến nhất hiện nay trên thế giới!<br>► Gặp gỡ, tìm hiểu những con người đầy mới mẻ trên Tinder và thoải mái buôn dưa lê mọi lúc, mọi nơi bạn thích!<br><br>Tìm ai đó hợp cạ tụ tập? Muốn gặp gỡ mọi người với nhiều cá tính và vùng miền khác nhau? Và có thêm bạn mới?<br>Muốn tìm ai đó cùng chung sở thích của bạn?<br>Tinder luôn sẵn sàng giúp bạn kết nối với đối tượng tương hợp hoàn hảo.', 'resources/images/app25.jpg', '2021-01-01', 'publish'),
(26, 'SEFVI - Mạng Xã Hội', 'resources/files/app26.zip', 1, 2, '0', 0, 'Mạng Xã Hội SEFVI là nơi giao lưu, chia sẻ những khoảnh khắc vui buồn', 'Mạng Xã Hội SEFVI có gì đặc biệt?\r\n<br>+ Kết nối với bạn bè ở xung quanh bạn.\r\n<br>+ Chat với bạn bè thật dễ dàng với các tính như: Voice, hệ thống gif,...\r\n<br>+ Chia sẻ những khảnh khắc với bạn bè và gia đình của bạn.\r\n<br>+ Dễ dàng đăng Hình ảnh, Video...lên tường và chia sẻ chúng\r\n<br>+ Đăng tin tự xóa sau 24 giờ\r\n<br>+ Viết Blog cá nhân và chia sẻ Blog với người khác nếu bạn muốn\r\n<br>+ Tạo sự kiện, chia sẻ/quảng bá sự kiện...\r\n<br>+ Đăng rao vặt', 'resources/images/app26.jpg', '2021-01-01', 'publish'),
(27, 'Litmatch—Make new friends', 'resources/files/app27.zip', 1, 2, '0', 3, 'Litmatch là nơi gặp gỡ trò chuyện với những người bạn mới', 'Nhiều người dùng thông qua Litmatch đã tìm được bạn bè mới. Họ có thể tận hưởng chia sẻ cảm xúc thoải mái thông qua các chức năng trực tuyến khác nhau và nhiều người trong số họ đã trở thành bạn bè.<br><br>Các chức năng tuyệt vời:\r\n<br>Soul Game: Cuộc trò chuyện bằng tin nhắn giới hạn trong 3 phút, cùng thêm nhau bạn bè nếu cả hai thấy phù hợp.\r\n<br>Voice Game: Cuộc gọi giới hạn trong 7 phút, lắng nghe giọng nói dịu dàng và ngọt ngào của đối phương mọi lúc mọi nơi\r\n<br>Movie Game: Cùng mọi người xem bộ phim được đề xuất , các chủ đề phổ biến sẽ giúp bầu không khí trò chuyện càng thêm thoải mái\r\n<br>Xem chỉ tay : Dự đoán sức khỏe và công việc của bạn.\r\n<br>Một nơi an toàn để bạn có thể chia sẻ các suy nghĩ và cảm xúc chân thực của mình ❤️❤️❤️', 'resources/images/app27.jpg', '2021-01-01', 'publish'),
(28, 'WeChat', 'resources/files/app28.zip', 1, 2, '0', 188, 'WeChat không chỉ là một ứng dụng nhắn tin và mạng xã hội ', 'Tại sao hơn một tỷ người lựa chọn sử dụng WeChat?\r\n<br>• NHIỀU CÁCH ĐỂ TRÒ CHUYỆN HƠN: Nhắn tin cho bạn bè bằng tin nhắn, hình ảnh, giọng nói, video, chia sẻ vị trí và hơn thế nữa. Tạo nhóm trò chuyện với tối đa 500 thành viên.\r\n<br>• CUỘC GỌI THOẠI & VIDEO: Cuộc gọi thoại và video chất lượng cao tới khắp mọi nơi trên thế giới. Thực hiện cuộc gọi video nhóm với tối đa 9 người.\r\n<br>• VỊ TRÍ THỜI GIAN THỰC: Bạn không giỏi về giải thích phương hướng với người khác? Chia sẻ vị trí trong thời gian thực của bạn chỉ bằng một nút chạm.\r\n<br>• KHOẢNH KHẮC: Bạn sẽ không bỏ quên những khoảnh khắc yêu thích của mình. Hãy đăng ảnh, video và nhiều hơn nữa để chia sẻ với bạn bè trên dòng Khoảnh khắc cá nhân của bạn.\r\n<br>• HỘP THỜI GIAN (MỚI!): Chia sẻ suy nghĩ trong ngày của bạn. Ghi lại video ngắn để đăng trong phần Hộp Thời gian của bạn trước khi chúng biến mất sau 24 giờ.\r\n<br>• THƯ VIỆN NHÃN: Duyệt hàng ngàn nhãn dán vui nhộn, nhãn hình động để giúp thể hiện bản thân trong các cuộc trò chuyện, gồm các nhãn dán nhân vật hoạt hình và phim yêu thích của bạn.\r\n<br>• NHÃN DÁN TÙY CHỈNH (MỚI!): Hãy tạo cho cuộc trò chuyện trở nên độc đáo hơn với các nhãn tùy chỉnh và tính năng nhãn tự chụp.\r\n<br>• TÀI KHOẢN CHÍNH THỨC: Hàng ngàn tài khoản để theo dõi các nội dung và tin tức độc đáo để tạo niềm yêu thích đọc tin mỗi ngày của bạn.\r\n<br>• CHƯƠNG TRÌNH NHỎ: Vô số dịch vụ của bên thứ ba, tất cả có trong ứng dụng WeChat không cần cài đặt bổ sung, giúp tiết kiệm thời gian và bộ nhớ điện thoại quý báu của bạn.', 'resources/images/app28.jpg', '2021-01-01', 'publish'),
(29, 'Nuce - Mạng xã hội sinh viên Việt Nam', 'resources/files/app29.zip', 1, 2, '0', 0, 'Nuce là mạng xã hội do sinh viên phát triển', 'Đăng kí hệ tín chỉ là nỗi ám ảnh của mỗi sinh viên - giải pháp của tôi có thể giúp các bạn tối ưu truy cập vào trang đăng ký nhà trường một cách nhanh nhất có thể hạn chế tắc nghẽn sập sever.?️?️\r\n<br>Gọi video call tính năng này giúp bạn liên lạc với người thân miễn phí không giới hạn thời gian. ??\r\n<br>Tích hợp game giải trí sau giờ học căng thẳng trên trường????\r\n<br>Kết bạn bằng mã QR chia sẻ thông tin cá nhân cho nhau.???\r\n<br>Những video Hot được chia sẽ bởi người dùng cùng với bản nhạc ngắn trend được cập nhật thường xuyên .?️?️️?️?️?️?\r\n<br>Chat với người thân hoặc crush của bạn.\r\n<br>Và một số tính năng hưu ích về bộ đọc quét và đọc văn bản hình ảnh\r\nKiểm tra sức khỏe qua chỉ số IBM?????\r\n<br>Dịch trực tiếp hơn 50 ngôi ngữ từ camera của bạn ngay tức thì.', 'resources/images/app29.jpg', '2021-01-01', 'publish'),
(30, 'Adobe Acrobat Reader', 'resources/files/app30.zip', 1, 3, '0', 0, 'Do you need to work with documents on the go?', 'Subscribe to Adobe Acrobat if you need a PDF editor to edit text and images, a PDF converter to export to and from PDF, or more advanced features to create PDFs, combine PDF documents, organize PDFs, and more.<br><br>VIEW AND PRINT PDFs\r\n<br>• Open and view PDFs with the free Adobe PDF viewer app.\r\n<br>• Choose Single Page or Continuous scroll mode.\r\n<br>• Help save battery with dark mode.\r\n<br>• Print documents directly from your device.\r\n<br><br>READ PDFs MORE EASILY\r\n<br>• Get the best PDF reading experience with Liquid Mode.\r\n<br>• Content in your PDF document reflows to fit your screen.\r\n<br>• Use the Liquid Mode outline for quick navigation.\r\n<br>• Search to find text fast in your PDF documents.', 'resources/images/app30.jpg', '2021-01-01', 'publish'),
(31, 'Adobe Creative Cloud', 'resources/files/app31.zip', 1, 3, '0', 0, 'Take Creative Cloud with you to manage your files, view tutorials', 'LEARN MORE\r\n<br>Get the most out of your Creative Cloud apps with engaging videos and tutorials. Filter by your favorite apps and track your progress through a series of tutorials.\r\n<br><br>ACCESS YOUR FILES\r\n<br>Search, browse, and preview design assets like Photoshop, Illustrator, and InDesign files as well as PDFs, XD prototypes, Lightroom photos, mobile creations, and Libraries, both online and off. Add files to Creative Cloud from your mobile device. Get your graphics from Adobe Stock and Creative Cloud Libraries into other apps by saving to your camera roll.\r\n<br><br>2GB OF STORAGE\r\n<br>Free, basic Creative Cloud membership includes 2GB of complimentary storage for file syncing and sharing.', 'resources/images/app31.jpg', '2021-01-01', 'publish'),
(32, 'Adobe Scan', 'resources/files/app32.zip', 1, 3, '0', 0, 'Turn your device into a powerful, portable document scanner, complete with OCR', 'CAPTURE DOCS, BOOKS, TAX RECEIPTS, AND MORE\r\n<br>Scan anything with precision with this mobile PDF scanner app. Advanced image technology automatically detects your documents for borders, sharpens scanned content, and recognizes text (OCR).\r\n<br><br>ENHANCE SCANS WITH ADOBE\'S SCANNING AND EDITING APP\r\n<br>Touch up photo scans and documents from your camera roll. Whether it’s a PDF or photo, you can preview, reorder, crop, rotate and adjust color.\r\n<br><br>REUSE SCANS WITH OCR\r\n<br>Turn your photo scan into a high-quality Adobe PDF document that unlocks content through automated text recognition (OCR). You can reuse content after scanning PDF documents thanks to OCR. Use it as a book scanner to quickly digitize bulk pages.', 'resources/images/app32.jpg', '2021-01-01', 'publish'),
(33, 'Adobe Illustrator Draw', 'resources/files/app33.zip', 1, 3, '0', 0, 'Winner of the Tabby Award for Creation, Design and Editing and PlayStore Editor’s Choice Award!', 'Illustrators, graphic designers and artists can:\r\n<br>• Zoom up to 64x to apply finer details.\r\n<br>• Sketch with five different pen tips with adjustable opacity, size and color.\r\n<br>• Work with multiple image and drawing layers.\r\n<br>• Rename, duplicate, merge and adjust each individual layer.\r\n<br>• Insert basic shape stencils or new vector shapes from Capture.\r\n<br>• Send an editable native file to Illustrator or a PSD to Photoshop that automatically opens on your desktop.\r\n<br><br>Try using Draw with:<br>Photoshop\r\n<br>Illustrator\r\n<br>Capture\r\n<br>Photoshop Sketch', 'resources/images/app33.jpg', '2021-01-01', 'publish'),
(34, 'Adobe Premiere Rush', 'resources/files/app34.zip', 1, 3, '0', 0, 'Shoot, edit, and share online videos anywhere.', 'Feed your channels a steady stream of awesome with Adobe Premiere Rush, the all-in-one, cross-device video editor. Powerful tools let you quickly create videos that look and sound professional, just how you want. Share to your favorite social sites right from the app and work across devices. Use it for free as long as you want with unlimited exports — or upgrade to access all premium features and hundreds of soundtracks, sound effects, loops, animated titles, overlays, and graphics.\r\n<br><br>Add music and titles to videos and apply video effects to clips in your multitrack timeline with the video editor used by influencers, vloggers, and pros. Crop videos to customize and share to your favorite social sites, including YouTube, Facebook, Instagram and TikTok, right from the app.\r\n<br><br>PRO-QUALITY VIDEO\r\n<br>Built-in professional camera functionality lets you capture high-quality content right from the app and start video editing immediately.\r\n<br><br>EASY EDITING AND VIDEO EFFECTS\r\n<br>Arrange video, audio, graphics, and photos with drag and drop. Trim and crop videos, flip and mirror video clips, and add images, stickers and overlays to video clips. Adjust video speed with speed controls and enhance color with intuitive presets and customization tools.\r\n<br>Effortlessly create pan and zoom effects for images with one click. Make your videos pop by simply selecting the start and end points on your still images, and changing the scale and position as needed.', 'resources/images/app34.jpg', '2021-01-01', 'publish'),
(35, 'Adobe Capture', 'resources/files/app35.zip', 1, 3, '0', 1, 'Adobe Capture turns your Android phone/tablet into a creation machine.\r\n', 'Imagine looking through your camera to see patterns, vectors, and even fonts. Now imagine turning those visions into design materials to immediately use in Adobe Photoshop, Adobe Illustrator, Adobe Premiere Pro, Adobe Fresco, and more. The power to transform the world around you into creative assets to build your projects is in the palm of your hands today.\r\n<br><br>Vectorize on the Go\r\n<br>Create vectors instantly with Shapes. Turn images into smooth, detailed, scalable vectors with 1-32 colors, for use in logos, illustration, animation, and more. Point and shoot at your drawing or upload a photo and watch it magically transform into clean, crisp lines.\r\n<br><br>Identify Typography\r\n<br>Find your perfect font using Adobe Capture. Take a photo of the type you like (in a magazine, on a label, a sign, anywhere!) and watch a list of similar Adobe Fonts magically appear.\r\n<br><br>Create Color Themes and Gradients\r\n<br>Designers, rejoice! Looking for customized color palettes? Find an inspiring gradient? Aim your camera at the scene that has the colors you want and capture them to use in your artwork.\r\n', 'resources/images/app35.jpg', '2021-01-01', 'publish'),
(36, 'Adobe Photoshop Sketch', 'resources/files/app36.zip', 1, 3, '0', 0, 'Draw with pencils, pens, markers, erasers, thick acrylic, ink brush, soft pastel', 'Artists tell us they love the:\r\n<br>• Access to 11 tools that can adjust size, color, opacity and blending settings.\r\n<br>• Ability to create an infinite variety of Sketch brushes using Capture.\r\n<br>• Ability to add multiple image and drawing layers they can restack, rename, transform and merge.\r\n<br>• Flexibility to organize their favorite tools and colors in the toolbar\r\n<br>• Ability to send their sketches to Photoshop or Illustrator with layers preserved\r\n<br><br>ADOBE STOCK\r\n<br>Search for and license high-res, royalty-free images from inside Sketch. Incorporate quality imagery into your work.\r\n\r\n<br><br>CREATIVE CLOUD LIBRARIES\r\n<br>Get easy in-app access to your assets — including Adobe Stock images and brushes created in Capture.\r\n\r\n<br><br>DIRECT TO DESKTOP\r\n<br>Send a file to Photoshop or Illustrator with layers preserved. It automatically opens on your desktop, letting you effortlessly build on your idea.', 'resources/images/app36.jpg', '2021-01-01', 'publish'),
(37, 'Adobe XD', 'resources/files/app37.zip', 1, 3, '0', 0, 'Eliminate the guesswork by previewing your Adobe XD designs', 'Eliminate the guesswork by previewing your Adobe XD designs complete with transitions on native devices, in real time via USB (macOS only) or by loading them as cloud documents.\r\n<br><br>If you enjoy using Adobe XD, please share a nice review. It really helps!\r\n<br><br>Adobe Terms of Use: http://www.adobe.com/go/terms\r\n<br>Adobe Privacy Policy: https://www.adobe.com/go/privacy_policy\r\n<br>Do not sell my information: https://www.adobe.com/privacy/ca-rights.html\r\n<br>© 2016-2021 Adobe. All rights reserved', 'resources/images/app37.jpg', '2021-01-01', 'publish'),
(38, 'Adobe Comp', 'resources/files/app38.zip', 1, 3, '0', 0, 'Lay out an idea with real assets like photos, text, shapes and fonts. ', 'Graphic designers and artists can explore a concept using:\r\n<br>• Prebuilt mobile, print and web sizes. Create your own custom size.\r\n<br>• Gestures that drop in placeholder text, basic shapes, graphics and editable text boxes.\r\n<br>• Guides and grids to align and work with spacing controls.\r\n<br>• Professional fonts powered by Adobe Fonts.\r\n<br>• Send the idea to the desktop where it will automatically open in InDesign, Illustrator or Photoshop.\r\n<br><br>LIBRARIES\r\n<br>Get easy in-app access to your assets — including Adobe Stock images or vectors and color themes from Capture.\r\n\r\n<br><br>LINKED ASSETS\r\n<br>Assets you pull into Comp from your Library will display as linked files in Illustrator and InDesign and as Smart Objects in Photoshop.\r\n<br><br>POWERED BY CREATIVESYNC\r\n<br>Adobe CreativeSync ensures that your files, fonts, design assets, settings and more all instantly appear in your workflow wherever you need them.', 'resources/images/app38.jpg', '2021-01-01', 'publish'),
(39, 'Tiki - Mua sắm online siêu tiện', 'resources/files/app39.zip', 1, 4, '0', 0, 'MUA SẮM ONLINE, THẬT RẺ, THẬT NHANH, THẬT TIỆN', '<br>- Giá tốt khỏi lo nghĩ từ các nhà bán hàng uy tín, từ đồ điện tử, vật dụng hằng ngày, hàng tiêu dùng, tất cả đều có.\r\n<br>- Giao nhanh vô đối: Chọn lựa hàng trăm ngàn sản phẩm giao trong 2 tiếng/trong ngày, lại còn được xem hàng trước khi trả tiền\r\n<br>- 1 app làm nên tất cả, thanh toán nạp tiền di động, voucher nhà hàng, tặng hoa cho người thân,… đặc biệt đặt mua đồ tươi sống TikiNGON giao trong tích tắc.\r\n<br>- Thanh toán tiện lợi qua COD, thẻ tín dụng/ATM, ví điện tử Momo, Zalopay\r\n<br>- Deal 0đ dành cho các khách hàng mới\r\n<br>- Cào là trúng: nhận Xu/Coupon mỗi ngày\r\n<br>- Giá sốc mỗi ngày: liên tục cập nhật deal thửa, không thể bỏ lỡ\r\n<br>- Chọn mua thêm sản phẩm chương trình Rẻ Hơn Hoàn Tiền khỏi lo nghĩ\r\n<br>- Săn coupon free ship, coupon giảm giá (coupon bắn liên tục)\r\n<br>- Đăng ký thẻ tín dụng TikiCARD, hoàn tiền 15%\r\n', 'resources/images/app39.jpg', '2021-01-01', 'publish'),
(40, 'Sendo', 'resources/files/app40.zip', 1, 4, '0', 0, 'Chào đón bạn đến với sự kiện mua sắm online SENDO: SALE SINH NHẬT - ĐẠI GIẢM GIÁ TOÀN SÀN từ 06.05 đ', 'MUA SẮM ONLINE MỌI LÚC MỌI NƠI, GIÁ BÌNH DÂN - TIẾT KIỆM\r\n<br>- Ứng dụng giúp khách hàng an tâm mua sắm mọi lúc, mọi nơi, tiết kiệm. Chi phí mua sắm thấp với MÃ GIẢM GIÁ & FREE SHIP có cả ngày.\r\n<br>- Dễ dàng tìm kiếm các sản phẩm chất lượng từ hàng trăm ngàn shop đăng tin, mua bán rao vặt. Ưu đãi lên đến 49%.\r\n<br>- Giao hàng nhanh miễn phí toàn quốc trong 3 giờ: Giờ vàng free shipping 0đ (Độc quyền tại Sendo)\r\n<br>- Nhận ưu đãi riêng khi mua hàng từ Shop+: Shop uy tín chỉ có tại Sendo.\r\n<br><br>ƯU ĐÃI ĐỘC QUYỀN CHỈ CÓ TRÊN APP\r\n<br>- Tận hưởng những ưu đãi đặc biệt giảm thêm 10% khi mua hàng trên Sendo App.\r\n<br>- Quản lý tài chính tiết kiệm với ưu đãi Mua Trước Trả Sau 0% lãi suất\r\n<br>- Thanh toán online tiện lợi được phép rút tiền, chuyển tiền, nạp tiền siêu nhanh qua liên kết ngân hàng bằng ví điện tử Senpay.\r\n<br>- Vào “Ví Ưu Đãi”: Nhận ngay những ưu đãi Sendo dành riêng cho bạn.\r\n<br>- Bạn muốn hiểu thêm về sản phẩm? Hãy sử dụng tính năng “Chat với người bán” để được tư vấn và yên tâm hơn khi mua hàng tại Sendo (Sen Đỏ).\r\n<br>- Xem Livestream nhận ngay Deal Độc quyền & Voucher Hot từ người bán\r\n<br>- Xả Hàng mỗi ngày tại FLASH SALE giá sốc chỉ từ 1K.\r\n<br>- Chỉ với một click để theo dõi và cập nhật trạng thái đơn đặt hàng của bạn.', 'resources/images/app40.jpg', '2021-01-01', 'publish'),
(41, 'ShopBack - Mua sắm & Hoàn tiền', 'resources/files/app41.zip', 1, 4, '0', 0, 'ShopBack cung cấp cho bạn giải pháp mua hàng online thông minh hơn', 'Ra mắt vào năm 2014, chúng tôi đã phát triển vượt bậc và trở thành trang Hoàn tiền hàng đầu tại các nước Châu Á - Thái Bình Dương như Singapore, Malaysia, Indonesia, Philippines, Thái Lan, Đài Loan và Úc. ShopBack cũng đã xuất hiện trên nhiều trang báo lớn tại châu Á như Tech in Asia, Forbes, Yahoo, Channel News Asia, Business Times, The Star và các kênh truyền thông khác.<br><br>Giải thưởng và Chứng nhận:\r\n<br>- Giải Vàng dành cho \"\"Start-Up Sáng tạo nhất (Giai đoạn tăng trưởng) tại Lễ trao giải SiTF\r\n<br>- Giải \"\"Doanh nghiệp Start-Up sáng giá nhất trong năm 2015\"\" bởi Vulcan Post\r\n<br><br>\r\nTính năng nổi bật:\r\n<br>• Hưởng các ưu đãi, voucher và mã khuyến mãi mới nhất từ hơn 100 trang bán hàng.\r\n<br>• Nhận thông báo các deal và ưu đãi hấp dẫn được cập nhật thường xuyên từ ShopBack.\r\n<br>• Truy cập các trang bán hàng được yêu thích nhất trên ShopBack.\r\n<br>• Tìm kiếm cửa hàng, trang bán hàng có tỉ lệ Hoàn tiền cao nhất.\r\n<br>• Lựa chọn và chuyển hướng đến trang bán hàng yêu thích.\r\n<br>• Theo dõi Hoàn tiền của bạn hằng ngày.\r\n<br>• Thuận tiện trong việc rút tiền trực tiếp về tài khoản ngân hàng.\r\n<br>• Nhận thông báo mỗi khi bạn nhận được Hoàn tiền và nhận được hoàn tiền đã rút.', 'resources/images/app41.jpg', '2021-01-01', 'publish');
INSERT INTO `product` (`id_product`, `name`, `file`, `id_developer`, `id_danhmuc`, `price`, `downloads`, `shortinfo`, `detail`, `image_logo`, `ngaydang`, `state`) VALUES
(42, 'Lazada Seller Center', 'resources/files/app42.zip', 1, 4, '0', 0, 'Ứng dụng chính thức dành riêng cho Nhà Bán Hàng LAZADA.', 'Bắt đầu sự nghiệp kinh doanh online đơn giản cùng Lazada và hưởng ngay hàng chục lợi ích dành cho NGƯỜI BÁN. Tải app đăng ký bán hàng cùng LAZADA ngay!\r\nLợi ích khi bán hàng cùng Lazada:\r\n<br>- Miễn phí hoa hồng, không phí đăng bán trọn đời\r\n<br>- Tiếp cận 100 triệu khách hàng miễn phí trên Lazada.\r\n<br>- Nhiều ưu đãi dành cho Người Bán Mới\r\n<br>- Miễn phí các khóa học bán hàng chuyên nghiệp\r\n<br>- Miễn phí sử dụng các công cụ quảng cáo\r\n<br>- Hưởng lượt truy cập khủng từ các chiến dịch lớn của Lazada mỗi tháng\r\n<br><br>Bán hàng online trở nên đơn giản hơn tại LAZADA với các tính năng của ứng dụng Lazada Seller Center:\r\n<br>* ĐĂNG KÝ NHÀ BÁN HÀNG\r\n<br>• Linh hoạt trong loại hình kinh doanh: cá nhân hoặc doanh nghiệp\r\n<br>• Tiếp cận các khóa học miễn phí từ Học viện Lazada\r\n<br>• Kích hoạt tài khoản và bắt đầu kinh doanh chỉ với 3 bước đơn giản\r\n<br><br>* QUẢN LÝ SẢN PHẨM\r\n<br>• Đăng tải và chỉnh sửa sản phẩm nhanh chóng\r\n<br>• Kiểm tra giá bán, giá gốc và hàng tồn\r\n<br>• Theo dõi trạng thái và hiển thị sản phẩm\r\n<br><br>* CHAT\r\n<br>- Nhận tin nhắn từ khách hàng về sản phẩm hoặc tư vấn thắc mắc\r\n<br>- Giao tiếp dễ dàng và nhanh chòng với khách hàng với nhiều tính năng sẵn có\r\n<br>- Ứng dụng đơn hàng nhưng nhanh chóng và bảo mật không thể thiếu để phát triển kinh doanh và xây dựng tệp khách hàng trung thành', 'resources/images/app42.jpg', '2021-01-01', 'publish'),
(43, 'Shop Quen', 'resources/files/app43.zip', 1, 4, '0', 0, ' Kết nối được với toàn bộ khách hàng của mình', '1. Kết nối được với toàn bộ khách hàng của mình.\r\n<br>2. Lưu lại lịch sử thông tin khách hàng. Quản lý doanh số, thông kê đơn hàng.\r\n<br>3. Trao đổi được thông tin với khách hàng.\r\n<br>+ Thông tin sản phẩm bán.\r\n<br>+ Thông tin dịch vụ cung cấp.\r\n<br>+ Thông tin khuyến mại.\r\n<br>+ Nhắn tin, push thông tin cho khách hàng.\r\n<br>4. Khách hàng book lịch dễ dàng.\r\n<br>5. Chủ động đo được dung lượng, nhu cầu của khách hàng để dễ dàng chủ động kế hoạch.\r\n<br>6. Khách hàng chỉ nhìn thấy sản phẩm của mình.\r\n<br>7. Tiết kiệm thời gian, chi phí chờ đợi cho khách hàng của mình.\r\n<br>8. Chăm sóc khách hàng tốt hơn. Khách hàng được đánh giá dịch vụ.', 'resources/images/app43.jpg', '2021-01-01', 'publish'),
(44, 'Mua Sắm online - Mã giảm giá - Săn giá rẻ', 'resources/files/app44.zip', 1, 4, '0', 0, 'Bạn muốn mua sắm online một cách tiết kiệm nhất?', 'Mua Sắm online - Mã giảm giá - Săn giá rẻ tổng hợp và chia sẻ miễn phí các mã giảm giá, voucher Lazada, shopee. Mua Sắm online - Mã giảm giá - Săn giá rẻ cung cấp mã khuyến mãi cập nhật hàng ngày, hàng giờ. Chỉ với vài phút truy cập bạn đã có thể tiết kiệm cho mình 50k, 100k thậm chí 500k hoặc nhiều hơn nữa. Bằng cách sử dụng các mã giảm giá do Mua Sắm online - Mã giảm giá - Săn giá rẻ cung cấp bạn đã tiết kiệm rất nhiều khi mua sắm online.\r\n<br><br>Mua Sắm online - Mã giảm giá - Săn giá rẻ tổng hợp kinh nghiệm mua hàng, kinh nghiệm săn hàng khuyến mãi. <br><br>Chia sẻ những kinh nghiệm mua hàng thực sự của tác giá, giúp bạn tránh mua hàng kém chất lượng, hàng giả hàng nhái.\r\n<br><br>Mua Sắm online - Mã giảm giá - Săn giá rẻ thông tin danh mục tổng hợp các khuyến mãi HOT tại Lazada, shopee, tiki, bật mí trước thông tin trong các đợt khuyến mãi lớn như sinh nhật Lazada, shopee, tiki, Lazada khuyến mãi 9.9, 11.11, 12.12. Thông tin sớm các flash sale giá sốc sắp mở bán độc quyền trên Lazada, shopee, tiki.\r\n<br><br>Mua Sắm online - Mã giảm giá - Săn giá rẻ là hoàn toàn MIỄN PHÍ. Toàn bộ mã giảm giá, khuyến mãi của chúng tôi được cập nhật liên tục 24/7.', 'resources/images/app44.jpg', '2021-01-01', 'publish'),
(45, 'Shoply', 'resources/files/app45.zip', 1, 4, '0', 0, 'Shoply giúp bạn đặt mức giá mong muốn cho những sản phẩm Flash Sale trên Shopee.', 'Sale mở nếu giá sản phẩm thấp hơn hoặc bằng giá mong muốn của bạn hệ thông sẽ tự động thực hiện săn Flash Sale bằng 1 trong 3 thao tác do bạn lựa chọn:\r\n<br>► Thông báo cho bạn biết\r\n<br>► Tự động thêm vào giỏ hàng\r\n<br>► Tự động mua sản phẩm\r\n<br><br>Ngoài ra Shoply còn những chức năng như:\r\n<br>► Hỗ trợ nhận xu tự động hàng ngày, với số lượng Shopee xu khổng lồ bạn có thể đổi lấy vô số khuyến mãi, voucher trên Shopee.\r\n<br>►Tổng hợp voucher và mã giảm giá giúp bạn mua sắm sản phẩm với giá rẻ nhất.\r\n<br><br>Đừng bỏ lỡ những sản phẩm Flash Sale trên Shopee:\r\n<br>► Sản phẩm giá chỉ 1K\r\n<br>► Sản phẩm giá chỉ 9k\r\n<br>► Sản phẩm giảm 50%\r\n<br>► Và nhiều sản phẩm giảm giá khác...\r\n<br><br>Với Shoply bạn sẽ:\r\n<br>✷ Không lo phải canh giờ mở Flash Sale\r\n<br>✷ Không phải thức đêm để săn Flash Sale\r\n<br>✷ Không lo hết sản phẩm hot có số lượng rất ít\r\n<br>✷ Thoải mái đổi voucher với Shopee xu\r\n<br>✷ Tổng hợp và chia sẻ miễn phí các mã giảm giá Shopee, voucher Shopee mới nhất. Với hàng trăm mã giảm giá mỗi ngày giúp bạn tiết kiệm một khoản tiền khi mua sắm online trên Shopee!', 'resources/images/app45.jpg', '2021-01-01', 'publish'),
(46, 'META.vn', 'resources/files/app46.zip', 1, 4, '0', 0, 'META.vn - Mua sắm trực tuyến', 'Các sản phẩm được bán trên META.vn đảm bảo nguồn gốc xuất xứ rõ ràng, minh bạch. đảm bảo an toàn cho mọi giao dịch mua hàng tại website. Tất cả các giao dịch qua ngân hàng chúng tôi đều đứng tên duy nhất theo chủ tài khoản: CÔNG TY CỔ PHẦN MẠNG TRỰC TUYẾN META. Chúng tôi không sử dụng địa chỉ cá nhân hay bất kỳ tài khoản cá nhân nào cho việc liên hệ với người mua.\r\n<br><br>Sản phẩm kinh doanh bán hàng trực tuyến bao gồm:\r\n<br>- Đồ thể thao gồm các loại máy tập thể dục, máy chạy bộ, xe đạp tập, giàn tạ, đồ Golf, Tennis, Bóng bàn... các loại máy massage chăm sóc sắc đẹp\r\n<br>- Thiết bị y tế: Các loại máy massage chăm sóc sức khỏe, máy đo huyết áp, nhiệt kế, máy khí dung, xe lăn,...\r\n<br>- Đồ gia dụng: Các loại dụng cụ nhà bếp, bộ nồi, đồ nấu ăn, máy trồng rau mầm, máy làm kem - sữa chua, máy pha cà phê, đồ sưởi, chăn - đệm điện,...\r\n<br>- Thời trang: Các loại giầy, quần áo thể thao\r\n<br>- Công cụ dụng cụ: Các loại máy khoan, máy mài, máy cắt, máy rửa xe, khóa điện tử, dụng cụ cầm tay,...\r\n<br>- Phần mềm: Các loại phần mềm văn phòng, phần mềm học tập, phần mềm diệt virus, giáo trình điện tử,...\r\n<br>- Mỹ phẩm & làm đẹp: Các loại dầu gội đầu, kem ủ, dầu xả dưỡng tóc; các loại kem dưỡng da, chăm sóc mặt và toàn thân...\r\n', 'resources/images/app46.jpg', '2021-01-01', 'publish'),
(47, 'Fingo', 'resources/files/app47.zip', 1, 4, '0', 0, 'Fingo không chỉ là một ứng dụng mua sắm trực tuyến', 'NGƯỜI DÙNG MỚI ĐỘC QUYỀN\r\n<br>Voucher miễn phí cho mọi người dùng mới đăng ký;\r\n<br>Thưởng thức các mặt hàng RM1 & Half-Priced bằng cách bắt đầu một nhóm;\r\n<br>Mua các sản phẩm phạm vi ưa thích với giao hàng miễn phí để nhận phiếu mua hàng & 11 đặc quyền độc quyền khác;\r\n<br>Bên cạnh đó, còn có thêm tiền hoàn lại, tiền thưởng, chứng từ, quà tặng miễn phí, giao hàng miễn phí, giải thưởng hoạt động và nhiều lợi ích khác đang chờ bạn!\r\n<br><br>SẢN PHẨM TOÀN CẦU CHOSEN\r\n<br>Tất cả các sản phẩm được đề xuất bởi khách hàng toàn cầu hoặc người mua chuyên nghiệp, chúng tôi đã thắng phát hành chúng cho đến khi chúng tôi đảm bảo chất lượng. Fingo cung cấp cho mọi người mua sắm trải nghiệm mua sắm lý tưởng thông qua giá VIP, hoàn lại tiền, hoàn lại tiền, khuyến mãi và nhiều lợi ích bất ngờ hơn.\r\n<br>Các danh mục có sẵn: Hồi giáo, Nhật Bản và Hàn Quốc, may mặc, thời trang, chăm sóc da, làm đẹp và mỹ phẩm, giày dép, túi xách và hành lý, trẻ sơ sinh & bà mẹ, trẻ sơ sinh & đồ chơi, sinh hoạt tại nhà, thiết bị, thiết bị kỹ thuật số & công nghệ, xe, chăm sóc cá nhân, thể thao và ngoài trời cho nam giới, phụ nữ, trẻ em.\r\n<br>Các thương hiệu nổi bật hàng đầu, bán hàng flash và bán hàng nóng được phát hành hàng ngày\r\n<br><br>MUA SẮM DEALS TỐT NHẤT\r\n<br>-Tất cả thời gian bạn mời một người dùng mới, bạn sẽ nhận được một phiếu mua hàng trị giá 5 đô la Úc\r\nPhiếu quà tặng hàng ngày và được giảm giá hơn 80%\r\n<br>-Nhiều chương trình khuyến mãi: Bán hàng lễ hội, Bán hàng trong ngày, ưu đãi đặc biệt, flash sale, mua theo nhóm, bán nóng, giao hàng miễn phí, v.v.\r\n<br>-Bạn có thể nhận iPhone, vàng, tiền mặt, mã khuyến mãi, quà tặng miễn phí và các lợi ích khác từ trang Facebook của Fingo / YouTube Live\r\nĐịa chỉ trực tiếp: facebook @FingoMalaysia\r\n<br>-Be một PS, truy cập vào nhiều lợi ích hơn!\r\n', 'resources/images/app47.jpg', '2021-01-01', 'publish'),
(48, 'Wish', 'resources/files/app48.zip', 1, 4, '0', 0, 'Chào mừng bạn đến với khu mua sắm di động cực kỳ tuyệt vời của bạn!', 'Wish là một ứng dụng mua sắm hàng đầu, dễ sử dụng cung cấp hơn 100 triệu sản phẩm với giá cực kỳ thấp. Cửa hàng có nhiều sản phẩm thời trang, giày dép, thiết bị điện tử, hàng gia dụng, các mặt hàng dành cho trẻ em, sản phẩm làm đẹp, nữ trang, đồng hồ, phụ kiện và nhiều hơn nữa.\r\n<br><br>?CÁC KHOẢN TIẾT KIỆM TUYỆT VỜI?\r\n<br>Mua sản phẩm trực tiếp từ các nhà sản xuất với giá giảm 60-90%.\r\n\r\n<br><br>?SẢN PHẨM CÓ CHẤT LƯỢNG?\r\n<br>Mua sắm các mặt hàng được đánh giá và xếp hạng hàng đầu bởi người dùng được chọn riêng theo ưu tiên của bạn.\r\n<br><br>?CÁC MẶT HÀNG ĐA DẠNG?\r\n<br>Tiếp cận bộ sưu tập đồ sộ các sản phẩm: hơn 100 triệu nhà sản xuất và thương hiệu yêu thích.\r\n<br><br>?PHẦN THƯỞNG TUYỆT VỜI?\r\n<br>Quay Blitz Buy để chiến thắng thêm nhiều khoản giảm giá, và tích lũy điểm với từng lần mua hàng để sử dụng làm phần thưởng.\r\n<br><br>?VẬN CHUYỂN TRỰC TIẾP?\r\n<br>Tận hưởng dịch vụ giao hàng tận nơi chỉ bằng thao tác chạm với các ngón tay, và theo dõi các lần mua hàng của bạn trên đường đi.\r\n<br><br>?HOÀN TRẢ DỄ DÀNG?\r\n<br>Được hoàn trả miễn phí và hoàn tiền dễ dàng với bất kỳ mặt hàng nào không hoàn hảo, hoặc liên hệ với nhóm hỗ trợ khách hàng dễ thương của chúng tôi.\r\n', 'resources/images/app48.jpg', '2021-01-01', 'publish'),
(49, 'LMHT: Tốc Chiến', 'resources/files/LMHT_Toc_Chien.zip', 1, 1, '0', 5, 'Game rất hay.', '</strong>Tải đi rồi biết.</strong>', 'resources/images/app49.png', '2021-05-19', 'publish');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thecao`
--

CREATE TABLE `thecao` (
  `id_thecao` int(11) NOT NULL,
  `seri` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `menhgia` decimal(10,0) NOT NULL,
  `trangthai` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thecao`
--

INSERT INTO `thecao` (`id_thecao`, `seri`, `menhgia`, `trangthai`) VALUES
(1, 'ABC123456ABC', '1000000', 'used'),
(2, 'abcxabcxabcx', '500000', 'used'),
(3, '123456789', '500000', 'free');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `theloai`
--

CREATE TABLE `theloai` (
  `id_theloai` int(11) NOT NULL,
  `tentheloai` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `theloai`
--

INSERT INTO `theloai` (`id_theloai`, `tentheloai`) VALUES
(1, 'Hành động'),
(2, 'Thể thao'),
(3, 'Gia đình'),
(4, 'Thế giới mở'),
(5, 'Phiêu lưu'),
(6, 'Mô phỏng'),
(7, 'Giải đố'),
(8, 'Chiến thuật'),
(9, 'Ảnh & Video'),
(10, 'Kinh doanh'),
(11, 'Sức khỏe'),
(12, 'Giáo dục'),
(13, 'Trẻ em'),
(14, '18+'),
(15, 'MOBA'),
(16, 'Tốc độ'),
(17, 'Nhập vai'),
(18, 'RPG'),
(19, 'Đế chế'),
(21, 'Transformer');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `theloai_sanpham`
--

CREATE TABLE `theloai_sanpham` (
  `id_product` int(11) NOT NULL,
  `id_theloai` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `theloai_sanpham`
--

INSERT INTO `theloai_sanpham` (`id_product`, `id_theloai`) VALUES
(1, 1),
(1, 16),
(2, 8),
(2, 17),
(3, 2),
(3, 13),
(4, 1),
(4, 5),
(4, 20),
(5, 9),
(5, 19),
(6, 9),
(6, 19),
(7, 10),
(8, 9),
(8, 19),
(9, 9),
(9, 12),
(10, 9),
(10, 12),
(11, 9),
(11, 19),
(12, 9),
(12, 19),
(13, 10),
(14, 7),
(14, 13),
(0, 0),
(15, 1),
(15, 17),
(16, 6),
(16, 13),
(17, 6),
(17, 17),
(18, 1),
(18, 5),
(18, 17),
(19, 7),
(19, 13),
(20, 12),
(20, 13),
(21, 16),
(21, 17),
(22, 9),
(22, 19),
(23, 9),
(23, 19),
(24, 9),
(24, 19),
(25, 9),
(25, 19),
(26, 9),
(26, 19),
(27, 9),
(27, 19),
(28, 9),
(28, 19),
(29, 0),
(29, 19),
(30, 9),
(30, 19),
(30, 9),
(30, 12),
(31, 9),
(31, 12),
(32, 9),
(32, 12),
(33, 9),
(33, 12),
(34, 9),
(34, 12),
(35, 9),
(35, 12),
(36, 9),
(36, 12),
(37, 9),
(37, 12),
(38, 9),
(38, 12),
(39, 10),
(40, 10),
(41, 10),
(42, 10),
(43, 10),
(44, 10),
(45, 11),
(46, 10),
(47, 10),
(48, 10),
(45, 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `birthdate` date NOT NULL,
  `phone` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `money` decimal(10,0) NOT NULL,
  `dev_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dev_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `id_card_front` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_card_back` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `activate` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id_user`, `email`, `password`, `name`, `birthdate`, `phone`, `gender`, `avatar`, `role`, `money`, `dev_email`, `dev_name`, `id_card_front`, `id_card_back`, `token`, `activate`) VALUES
(1, 'tada@gmail.com', '$2y$10$TycPC5biIsFJIh8q2QEinuz5RF0qn1yp3h5TCNlBygb9lToSJ5xlS', 'Nguyễn Huỳnh Tất Đạt', '2001-12-15', '0123454325', 'Nam', 'resources/images/img_avatar_m.png', 'admin', '14570000', 'tada@gmail.com', 'TADA', '', '', '', 1),
(9, 'haan1601@gmail.com', '$2y$10$6NRlsj5ZQNKF8v5ZilU2suslQNqDMjTEvezirnbwCrXEGYiOwcBYK', 'Nguyễn Ngọc Hạ An', '2001-01-16', '0971600213', 'Nữ', 'resources/images/img_avatar_m.png', 'user', '1000000', '', '', '', '', '', 1),
(13, 'hoangvietsherlockholmes@gmail.com', '$2y$10$GejVIbaa7y5AtXCznm8rsecpbAvVHbFU8FMfX3sUpABw.bGGuN4.i', 'Mai Hoàng Việt', '2021-05-03', '0971600213', 'Nam', 'resources/images/img_avatar_m.png', 'developer', '0', 'tada@gmail.com', 'TADA', 'resources/images/games.jpg', 'resources/images/games.jpg', '', 1),
(16, 'ngotiendat139@gmail.com', '$2y$10$Jrz4t4P/rz3YhZApBsWnj.gNrm2REnojFXAfMRf.2o6ma0BlK7YjC', 'Ngô Tiến Đạt', '2001-09-13', '0865548344', 'Nam', 'resources/images/img_avatar_m.png', 'user', '0', '', '', '', '', '', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_ungdung`
--

CREATE TABLE `user_ungdung` (
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user_ungdung`
--

INSERT INTO `user_ungdung` (`id_user`, `id_product`) VALUES
(1, 9),
(1, 10);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `danhgiasanpham`
--
ALTER TABLE `danhgiasanpham`
  ADD PRIMARY KEY (`id_danhgia`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id_danhmuc`);

--
-- Chỉ mục cho bảng `hinhanh_ungdung`
--
ALTER TABLE `hinhanh_ungdung`
  ADD PRIMARY KEY (`id_anh`,`id_ungdung`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`);

--
-- Chỉ mục cho bảng `thecao`
--
ALTER TABLE `thecao`
  ADD PRIMARY KEY (`id_thecao`);

--
-- Chỉ mục cho bảng `theloai`
--
ALTER TABLE `theloai`
  ADD PRIMARY KEY (`id_theloai`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`) USING BTREE,
  ADD UNIQUE KEY `email` (`email`);

--
-- Chỉ mục cho bảng `user_ungdung`
--
ALTER TABLE `user_ungdung`
  ADD PRIMARY KEY (`id_user`,`id_product`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `danhgiasanpham`
--
ALTER TABLE `danhgiasanpham`
  MODIFY `id_danhgia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id_danhmuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT cho bảng `thecao`
--
ALTER TABLE `thecao`
  MODIFY `id_thecao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `theloai`
--
ALTER TABLE `theloai`
  MODIFY `id_theloai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
