<!-- Footer -->
<footer>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="fb-page" data-href="https://www.facebook.com/doankhoaktcntvu/" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/doankhoaktcntvu/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/doankhoaktcntvu/">Đoàn Khoa Kỹ thuật và Công nghệ - TVU</a></blockquote></div>
			</div>

			<div class="col-md-4">
				<ul class="menu">
					<span>MENU</span>
					@foreach ($categorys as $category)
					@if($category->kind == 2)
					<li>
						<a href="{{$category->slug}}.html">{{$category->name}}</a>
					</li>
					@endif
					@endforeach
				</ul>
			</div>

			<div class="col-md-4">
				<ul class="address">
					<span>Contact</span>
					<li>
						<i class="fa fa-phone" aria-hidden="true"></i> <a href="tellto:02943855690">0294.3855690</a>
					</li>
					<li>
						<i class="fa fa-map-marker" aria-hidden="true"></i> <a href="#">Số 126 Nguyễn Thiện Thành, Khóm 4, Phường 5, TP. Trà Vinh, tỉnh Trà Vinh</a>
					</li>
					<li>
						<i class="fa fa-envelope" aria-hidden="true"></i> <a href="mailto:ktcn@tvu.edu.vn">ktcn@tvu.edu.vn</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</footer>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/bootstrap/bootstrap-select.min.js"></script>
<script src="assets/js/fileinput/fileinput.js"></script>
<script src="assets/js/fileinput/vi.js"></script>
<script src="admin_assets/bower_components/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="assets/js/totop.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
		$("#menu").click(function(){
			$("#menu-category").slideToggle("slow");
		});
	});
</script>

<script>(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.1&appId=688371478174244&autoLogAppEvents=1';
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
</body>
</html>
