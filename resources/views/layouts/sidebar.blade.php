<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
       
        <li class="{!! Request::segment(1) == 'home' ? 'active' : '' !!}"><a href="{!!'/home'!!}" active><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li class="{!! Request::segment(1) == 'quiz_title' ? 'active' : '' !!}"><a href="{!!'/quiz_title'!!}"><i class="fa fa-sticky-note text-green"></i> <span>Quiz Title</span></a></li>
        <li class="{!! Request::segment(1) == 'question' ? 'active' : '' !!}"><a href="{!!'/question'!!}"><i class="fa fa-circle-o text-aqua"></i> <span>Question</span></a></li>
        <li class="{!! Request::segment(1) == 'answer' ? 'active' : '' !!}"><a href="{!!'/answer'!!}"><i class="fa fa-book text-yellow"></i> <span>Answer</span></a></li>
        <li class="{!! Request::segment(1) == 'result' ? 'active' : '' !!}"><a href="{!!'/result'!!}"><i class="fa fa-tags text-maroon"></i> <span>Result</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
</aside>
