<?php
namespace TheThemeio\Widgets;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class The_Team_Block_1 {

	const ID = 1;

	public function controls( $widget ) {
		$widget->set_id( self::ID );
		$id = self::ID;

		$widget->panel( 'section', [
			'includes' => [ 'bg_gray' ],
		] );

		$widget->panel( 'header_content', [
			'small'  => esc_html__( 'Team', 'thesaas' ),
			'header' => esc_html__( 'Our Designers', 'thesaas' ),
			'lead'   => esc_html__( 'Meet out small team that make those great products.', 'thesaas' ),
		] );

		$widget->panel( 'team', [
			'members' => [
				[
					'image' => [ 'url' => thesaas_get_img_uri( 'avatar/5.jpg' ) ],
					'name' => esc_html__( 'Morgan Guadis', 'thesaas' ),
					'position' => esc_html__( 'Co-Founder & CEO', 'thesaas' ),
					'social_twitter' => '#',
					'social_facebook' => '#',
					'social_instagram' => '#',
				],
				[
					'image' => [ 'url' => thesaas_get_img_uri( 'avatar/6.jpg' ) ],
					'name' => esc_html__( 'John Senating', 'thesaas' ),
					'position' => esc_html__( 'Co-Founder & CTO', 'thesaas' ),
					'social_twitter' => '#',
					'social_facebook' => '#',
					'social_instagram' => '#',
				],
				[
					'image' => [ 'url' => thesaas_get_img_uri( 'avatar/7.jpg' ) ],
					'name' => esc_html__( 'Sandi Hormez', 'thesaas' ),
					'position' => esc_html__( 'Developer', 'thesaas' ),
					'social_twitter' => '#',
					'social_facebook' => '#',
					'social_instagram' => '#',
				],
				[
					'image' => [ 'url' => thesaas_get_img_uri( 'avatar/8.jpg' ) ],
					'name' => esc_html__( 'Animor Tiruse', 'thesaas' ),
					'position' => esc_html__( 'Designer', 'thesaas' ),
					'social_twitter' => '#',
					'social_facebook' => '#',
					'social_instagram' => '#',
				],
			],
		] );

	}



	public function html( $widget ) {
		$widget->set_id( self::ID );
		$settings = $widget->get_settings();

		$members = $settings['t1_team_member'];
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
				<div class="<?php echo $col_class; ?> team-1">
					<img src="<?php echo esc_url( $member['image']['url'] ); ?>" alt="<?php echo $member['name']; ?>">
					<h6><?php echo $member['name']; ?> <small><?php echo $member['position']; ?></small></h6>
					<p><?php echo $member['biography']; ?></p>
					<div class="social social-gray">
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
				var members = settings.t1_team_member;
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
						<div class="{{ col_class }} team-1">
							<img src="{{ member.image.url }}" alt="{{ member.name }}">
							<h6>{{{ member.name }}} <small>{{{ member.position }}}</small></h6>
							<p>{{{ member.biography }}}</p>
							<div class="social social-gray">
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
