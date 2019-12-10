<section class="timeline">
  <ul>
  	@foreach ($updates as $update)
	    <li>
	      <div class="content">
	      	<p class="time-update">{{ Carbon\Carbon::parse($update->created_at)->format('d/m/Y') }}</p>
	        <h2>
	          <time>{{ $update->title }}</time>
	        </h2>
	        <p style="text-align: justify;">{{ $update->content }}</p>
	      </div>
	    </li>
	@endforeach
  </ul>
</section>

@push('css')
<style type="text/css">

	.timeline h1,
	.timeline ul li .content h2 {
	  text-shadow: 1px 1px 1px rgba(56, 56, 56, 0.5);
	}
	.timeline ul {
	  padding: 50px 0;
	}
	.timeline ul li {
	  background: #dbe7f7;
	  position: relative;
	  margin: 0 auto;
	  width: 1px;
	  padding-bottom: 40px;
	  list-style-type: none;
	}
	.timeline ul li:last-child {
	  padding-bottom: 7px;
	}
	.timeline ul li:before {
	  content: "";
	  background: #3A7BD5;
	  position: absolute;
	  left: 50%;
	  top: 0;
	  transform: translateX(-50%);
	  -webkit-transform: translateX(-50%);
	  width: 20px;
	  height: 20px;
	  border: 3px solid #fff;
	  -webkit-border-radius: 50%;
	  -moz-border-radius: 50%;
	  border-radius: 50%;
	  box-shadow: 2px 0 26px 0px rgba(0,0,0,.16), 0 0px 5px 0 rgba(0,0,0,.12);
	}
	.timeline ul li .hidden {
	  opacity: 0;
	}
	.timeline ul li .content {
	  position: relative;
	  top: 7px;
	  width: 450px;
	  padding: 0px 5px 20px 5px;
	}

	.timeline ul li .content .time-update {
		font-size: 16px;
  		font-weight: bold;
  		margin-bottom: 7px;
	}


	.timeline ul li .content h2 {
	  padding-bottom: 10px;
	  font-size: 24px;
	}

	.timeline ul li:nth-child(odd) .content p,
	.timeline ul li:nth-child(odd) .content h2 {
		text-align: right;
	}

	.timeline ul li .content p {
		white-space: pre-line;
	}

	.timeline ul li:nth-child(even) .content {
		width: 335px;
		left: 10px;
	}

	.timeline ul li:nth-child(even) .content:before {
	  left: -38px;
	}

	.timeline ul li:nth-child(odd) .content {
		width: 335px;
    	left: calc(-450px - -105px);
	}
	.timeline ul li:nth-child(odd) .content:before {
	  right: -38px;
	}

	/* -------------------------
	   ----- Media Queries ----- 
	   ------------------------- */
	@media screen and (max-width: 1020px) {
	  .timeline ul li .content {
	    width: 41vw;
	  }

	  .timeline ul li:nth-child(odd) .content {
	    left: calc(-41vw - 45px);
	  }
	}
	@media screen and (max-width: 700px) {
	  .timeline ul li {
	    margin-left: 20px;
	  }
	  .timeline ul li .content {
	    width: calc(100vw - 100px);
	  }
	  .timeline ul li .content h2 {
	    text-align: initial;
	  }
	  .timeline ul li:nth-child(odd) .content {
	    left: 5px;
	  }
	  .timeline ul li:nth-child(odd) .content:before {
	    left: -33px;
	  }

	  .timeline ul li:nth-child(odd) .content p, .timeline ul li:nth-child(odd) .content h2 {
	  	text-align: left;
	  }
	}

</style>
@endpush