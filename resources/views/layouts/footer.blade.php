<footer class="sticky-footer">
    <div class="container">
        <div class="text-center">
            <small>Copyright © Your Website 2017</small>
        </div>
    </div>
</footer>
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fa fa-angle-up"></i>
</a>
<!-- Logout Modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Уже уходите?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Нажмите "Выход" ниже, если вы готовы закончить сессию.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Отмена</button>
                <a class="btn btn-primary" href="{{ route('logout') }}">Выход</a>
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap core JavaScript-->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<!-- Core plugin JavaScript-->
<script src="{{ asset('js/jquery.easing.min.js') }}"></script>
<!-- Custom scripts for all pages-->
<script src="{{ asset('js/sb-admin.min.js') }}"></script>
</div>
</body>

</html>
