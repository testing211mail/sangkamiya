<style type="text/css">
	
body {
  font-family: Arial;
  color: #ffffff;
  text-align: center;	
}

/*-=-=-=-=-=-=-=-=-=-=-=- */
/* Column Grids */
/*-=-=-=-=-=-=-=-=-=-=-=- */

.col_half { width: 49%; }
.col_third { width: 32%; }
.col_fourth { width: 23.5%; }
.col_fifth { width: 18.4%; }
.col_sixth { width: 15%; }
.col_three_fourth { width: 74.5%;}
.col_twothird{ width: 66%;}
.col_half,
.col_third,
.col_twothird,
.col_fourth,
.col_three_fourth,
.col_fifth{
	position: relative;
	display:inline;
	display: inline-block;
	float: left;
	margin-right: 2%;
	margin-bottom: 20px;
}
.end { margin-right: 0 !important; }
/* Column Grids End */

.wrapper { width: 980px; margin: 30px auto; position: relative; align-content: center;}
.counter { background-color: #7323DC ; padding: 20px 0; border-radius: 5px;}
.count-title { font-size: 20px; font-weight: normal;  margin-top: 5px; margin-bottom: 0; text-align: center; }
.count-text { font-size: 10px; font-weight: normal;  margin-top: 5px; margin-bottom: 0; text-align: center; }
.fa-2x { margin: 0 auto; float: none; display: table; color: #4ad1e5; }

</style>


	<br><br>
<div class="container text-center">

	<div class="wow fadeInLeft card-deck" data-wow-delay="1s">
		<div class="card border-success hvr-grow ulnone">
			<a href="<?php echo base_url().'home/education';?>">
			<img class="card-img-top" src="<?php echo base_url();?>assets/images/education.jpg" alt="Card image cap">
			<div class="card-img-overlay d-flex">
				<h5 class="alert bg-4 my-auto mx-auto"><?php echo $this->session->userdata('education'); ?>    <i class="fa fa-graduation-cap" aria-hidden="true"></i></h5>
			</div>
			</a>
		</div>

		<div class="card card-inverse border-danger hvr-grow ulnone">
			<a href="<?php echo base_url().'home/food';?>">
			<img class="card-img-top" src="<?php echo base_url();?>assets/images/food.jpg" alt="Card image cap">
			<div class="card-img-overlay d-flex">
				<h5 class="alert bg-6 my-auto mx-auto"><?php echo $this->session->userdata('food'); ?> <i class="fa fa-cutlery" aria-hidden="true"></i></h5>
			</div>
			</a>
		</div>

		<div class="card card-inverse border-warning hvr-grow ulnone">
			<a href="<?php echo base_url().'home/government';?>">
			<img class="card-img-top" src="<?php echo base_url();?>assets/images/govt.jpg" alt="Card image cap">
			<div class="card-img-overlay d-flex">
				<h5 class="alert bg-3 my-auto mx-auto"><?php echo $this->session->userdata('government'); ?>  <i class="fa fa-briefcase" aria-hidden="true"></i></h5>
			</div>
			</a>
		</div>
	</div>
	<br>
	<br>

	<div class="card-deck wow fadeInRight" data-wow-delay="1s">
		<div class="card border-danger hvr-grow ulnone">
			<a href="<?php echo base_url().'home/health';?>">
			<img class="card-img-top" src="<?php echo base_url();?>assets/images/health.jpg" alt="Card image cap">
			<div class="card-img-overlay d-flex">
				<h5 class="alert bg-6 my-auto mx-auto"><?php echo $this->session->userdata('health'); ?> <i class="fa fa-heartbeat" aria-hidden="true"></i></h5>
			</div>
			</a>
		</div>
		<div class="card border-warning hvr-grow ulnone">
			<a href="<?php echo base_url().'home/lifestyle';?>">
			<img class="card-img-top" src="<?php echo base_url();?>assets/images/lifestyle.jpg" alt="Card image cap">
			<div class="card-img-overlay d-flex">
				<h5 class="alert bg-3 my-auto mx-auto"><?php echo $this->session->userdata('lifestyle'); ?> <i class="fa fa-shopping-bag" aria-hidden="true"></i></h5>
			</div>
			</a>
		</div>

		<div class="card border-success hvr-grow ulnone">
			<a href="<?php echo base_url().'home/services';?>">
			<img class="card-img-top" src="<?php echo base_url();?>assets/images/services.jpg" alt="Card image cap">
			<div class="card-img-overlay d-flex">
				<h5 class="alert bg-4 my-auto mx-auto"><?php echo $this->session->userdata('services'); ?> <i class="fa fa-gavel" aria-hidden="true"></i></h5>
			</div>
			</a>
		</div>

	</div>
	<br>
	<br>

	<div class="card-deck wow fadeInLeft" data-wow-delay="1s">
		<div class="card border-warning hvr-grow ulnone">
			<a href="<?php echo base_url().'home/shops';?>">
			<img class="card-img-top " src="<?php echo base_url();?>assets/images/shops.jpg" alt="Card image cap">
			<div class="card-img-overlay d-flex">
				<h5 class="alert bg-3 my-auto mx-auto"><?php echo $this->session->userdata('shops'); ?> <i class="fa fa-shopping-cart" aria-hidden="true"></i></h5>
			</div>
			</a>
		</div>
		<div class="card border-danger hvr-grow ulnone">
			<a href="<?php echo base_url().'home/offers';?>">
			<img class="card-img-top" src="<?php echo base_url();?>assets/images/offers.jpg" alt="Card image cap">
			<div class="card-img-overlay d-flex">
				<h5 class="alert bg-6 my-auto mx-auto"><?php echo $this->session->userdata('offers'); ?> <i class="fa fa-bolt" aria-hidden="true"></i> </h5>
			</div>
			</a>
		</div>
		<div class="card gayab" style="background-color: #f4f4f4">
			
		</div>
	</div>

	<br>
	<br>
<!-- 	<div class="wrapper" align="center">
		<div>
    <div class="counter col_fourth">
      <i class="fa fa-users fa-2x"></i>
      <h2 class="timer count-title count-number" data-to="<?php echo ($count[0]->webcount); ?>" data-speed="1500"></h2>
       <p class="count-text ">Visitors Count</p>
    </div>

    <div class="counter col_fourth">
      <i class="fa fa-coffee fa-2x"></i>
      <h2 class="timer count-title count-number" data-to="<?php echo ($count[0]->servicecount); ?>" data-speed="1500">+</h2>
      <p class="count-text ">Services Count</p>
    </div>

    <div class="counter col_fourth">
      <i class="fa fa-address-book fa-2x"></i>
      <h2 class="timer count-title count-number" data-to="<?php echo ($count[0]->memcount); ?>" data-speed="1500"></h2>
      <p class="count-text ">Contacts</p>
    </div>
    </div>

   <div class="counter col_fourth end">
      <i class="fa fa-bug fa-2x"></i>
      <h2 class="timer count-title count-number" data-to="15" data-speed="1500"></h2>
      <p class="count-text ">aa</p>
    </div>
</div> -->

	<div class="card-deck wow " data-wow-delay="1s">
		<div class="card hvr-grow">
			<div class="card-body nb-majha">
				<i class="fa fa-users fa-3x"></i><br><hr>
			Visitors : <?php echo ($count[0]->webcount); ?>
			</div>
		</div>
		<div class="card hvr-grow">
			<div class="card-body nb-majha">
				<i class="fa fa-wrench fa-3x"></i><br><hr>
			Services : <?php echo ($count[0]->servicecount); ?>
			</div>
		</div>

		<div class="card  hvr-grow">
			<div class="card-body nb-majha">
				<i class="fa fa-address-book fa-3x"></i><br><hr>
			Contacts : <?php echo ($count[0]->memcount); ?>
			</div>
		</div>
	</div>

</div>
<script type="text/javascript">
	(function ($) {
	$.fn.countTo = function (options) {
		options = options || {};
		
		return $(this).each(function () {
			// set options for current element
			var settings = $.extend({}, $.fn.countTo.defaults, {
				from:            $(this).data('from'),
				to:              $(this).data('to'),
				speed:           $(this).data('speed'),
				refreshInterval: $(this).data('refresh-interval'),
				decimals:        $(this).data('decimals')
			}, options);
			
			// how many times to update the value, and how much to increment the value on each update
			var loops = Math.ceil(settings.speed / settings.refreshInterval),
				increment = (settings.to - settings.from) / loops;
			
			// references & variables that will change with each update
			var self = this,
				$self = $(this),
				loopCount = 0,
				value = settings.from,
				data = $self.data('countTo') || {};
			
			$self.data('countTo', data);
			
			// if an existing interval can be found, clear it first
			if (data.interval) {
				clearInterval(data.interval);
			}
			data.interval = setInterval(updateTimer, settings.refreshInterval);
			
			// initialize the element with the starting value
			render(value);
			
			function updateTimer() {
				value += increment;
				loopCount++;
				
				render(value);
				
				if (typeof(settings.onUpdate) == 'function') {
					settings.onUpdate.call(self, value);
				}
				
				if (loopCount >= loops) {
					// remove the interval
					$self.removeData('countTo');
					clearInterval(data.interval);
					value = settings.to;
					
					if (typeof(settings.onComplete) == 'function') {
						settings.onComplete.call(self, value);
					}
				}
			}
			
			function render(value) {
				var formattedValue = settings.formatter.call(self, value, settings);
				$self.html(formattedValue);
			}
		});
	};
	
	$.fn.countTo.defaults = {
		from: 0,               // the number the element should start at
		to: 0,                 // the number the element should end at
		speed: 1000,           // how long it should take to count between the target numbers
		refreshInterval: 100,  // how often the element should be updated
		decimals: 0,           // the number of decimal places to show
		formatter: formatter,  // handler for formatting the value before rendering
		onUpdate: null,        // callback method for every time the element is updated
		onComplete: null       // callback method for when the element finishes updating
	};
	
	function formatter(value, settings) {
		return value.toFixed(settings.decimals);
	}
}(jQuery));

jQuery(function ($) {
  // custom formatting example
  $('.count-number').data('countToOptions', {
	formatter: function (value, options) {
	  return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
	}
  });
  
  // start all the timers
  $('.timer').each(count);  
  
  function count(options) {
	var $this = $(this);
	options = $.extend({}, options || {}, $this.data('countToOptions') || {});
	$this.countTo(options);
  }
});
</script>