<footer class="page-footer font-small">
    <div class="footer-copyright black text-center text-white-50 py-3">
        <p class="lead text-center">Designed By | Wonsano Coding | 2020 -
            <span><?php echo date('Y'); ?></span>&copy;
            ...All Rights
            Reserved
        </p>
    </div>
</footer>

{{-- Scroll Back Button Starts --}}
<a class="scroll-to-top" href="#page-top">&#10148</a>
{{-- Scroll Back Button Ends --}}

{{-- Logout Modal --}}
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content bg-white">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body text-dark">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger no-underline hover:underline float-right" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"><i
                        data-feather="power"></i><span> Logout</span></a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
</div>
