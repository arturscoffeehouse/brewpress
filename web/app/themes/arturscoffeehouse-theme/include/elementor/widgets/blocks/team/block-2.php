<?php
namespace TheThemeio\Widgets;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class The_Team_Block_2 {

	const ID = 2;

	public function controls( $widget ) {
		$widget->set_id( self::ID );
		$id = self::ID;

		$widget->panel( 'section', [
			'includes' => [ 'bg_gray' ],
		] );

		$widget->panel( 'header_content', [
			'small'  => esc_html__( 'People', 'thesaas' ),
			'header' => esc_html__( 'The Team', 'thesaas' ),
			'lead'   => esc_html__( 'Meet out small team that make those great products.', 'thesaas' ),
		] );

		$widget->panel( 'team', [
			'members' => [
				[
					'image' => [ 'url' => thesaas_get_img_uri( 'avatar/1.jpg' ) ],
					'name' => esc_html__( 'Morgan Guadis', 'thesaas' ),
					'position' => esc_html__( 'Co-Founder & CEO', 'thesaas' ),
					'biography' => esc_html__( 'Signs you\'ll a, life itself to in signs seed under fruitful good open behold Our of stars whales forth.', 'thesaas' ),
					'social_twitter' => '#',
					'social_facebook' => '#',
					'social_instagram' => '#',
					'social_linkedin' => '#',
				],
				[
					'image' => [ 'url' => thesaas_get_img_uri( 'avatar/2.jpg' ) ],
					'name' => esc_html__( 'John Senating', 'thesaas' ),
					'position' => esc_html__( 'Co-Founder & CTO', 'thesaas' ),
					'biography' => esc_html__( 'So firmament sea them sea. Set saying land signs had the us replenish seed moved rule, place let.', 'thesaas' ),
					'social_twitter' => '#',
					'social_facebook' => '#',
					'social_instagram' => '#',
					'social_linkedin' => '#',
				],
				[
					'image' => [ 'url' => thesaas_get_img_uri( 'avatar/3.jpg' ) ],
					'name' => esc_html__( 'Sandi Hormez', 'thesaas' ),
					'position' => esc_html__( 'Director', 'thesaas' ),
					'biography' => esc_html__( 'Given of living created living fifth him Give heaven made open day, own land hath one him darkness.', 'thesaas' ),
					'social_twitter' => '#',
					'social_facebook' => '#',
					'social_instagram' => '#',
					'social_linkedin' => '#',
				],
			],
		] );

	}



	public function html( $widget ) {
		$widget->set_id( self::ID );
		$settings = $widget->get_settings();

		$members = $settings['t2_team_member'];
		$col_class = 'col-12 col-md-6 col-lg-3';
		$col_size = count( $members );
		switch ( $col_size ) {
			case 1:
				$col_class = 'col-12 col-md-6 offset-md-3';
				break;

			case 2:
				$col_class = 'col-12 col-md-6';
				break;

			case 3:
				$col_class = 'col-12 col-md-6 col-lg-4';
				break;

			default:
				$col_class = 'col-12 col-md-6 col-lg-3';
				break;
		}
		?>
		<?php $widget->html('section_tag'); ?>
			<?php $widget->html('section_header'); ?>

			<div class="row gap-y">
				<?php foreach ( $members as $member ) : ?>
				<div class="<?php echo $col_class; ?> team-2">
					<img src="<?php echo esc_url( $member['image']['url'] ); ?>" alt="<?php echo $member['name']; ?>">
					<h6><?php echo $member['name']; ?> <small><?php echo $member['position']; ?></small></h6>
					<p><?php echo $member['biography']; ?></p>
					<div class="social social-boxed social-rounded social-gray">
						<?php $widget->html( 'social', [ 'member' => $member ] ); ?>
					</div>
				</div>
				<?php endforeach; ?>
			</div>

		</div></section>
		<?php
	}



	public function javascript( $widget ) {
		$widget->set_id( self::ID );
		?>
		<?php $widget->js('section_tag'); ?>
			<?php $widget->js('section_header'); ?>

			<div class="row gap-y">
				<#
				var members = settings.t2_team_member;
				if ( members ) {
					var col_class = 'col-12 col-md-6 col-lg-3';
					var team_size = members.length;
					switch ( team_size ) {
						case 1:
							col_class = 'col-12 col-md-6 offset-md-3';
							break;

						case 2:
							col_class = 'col-12 col-md-6';
							break;

						case 3:
							col_class = 'col-12 col-md-6 col-lg-4';
							break;

						default:
							col_class = 'col-12 col-md-6 col-lg-3';
							break;
					}

					_.each( members, function( member ) {
					#>
					<div class="{{ col_class }} team-2">
						<img src="{{ member.image.url }}" alt="{{ member.name }}">
						<h6>{{{ member.name }}} <small>{{{ member.position }}}</small></h6>
						<p>{{{ member.biography }}}</p>
						<div class="social social-boxed social-rounded social-gray">
							<?php $widget->js( 'social' ); ?>
						</div>
					</div>
					<#
					} );
				}
				#>
			</div>

		</div></section>
		<?php
	}

}
