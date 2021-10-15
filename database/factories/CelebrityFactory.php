<?php

namespace Database\Factories;

use App\Models\Celebrity;
use Illuminate\Database\Eloquent\Factories\Factory;

class CelebrityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Celebrity::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'dob' => $this->faker->date,
            'nationality' => $this->faker->country,
            'bio' => $this->faker->text,
            'poster' => $this->randomposter(),
        ];
    }

    public function randomposter()
    {
        $posters = [
            'https://upload.wikimedia.org/wikipedia/commons/4/46/Leonardo_Dicaprio_Cannes_2019.jpg',
            'https://cdn2.kennedy-center.org/images/slideshow/TomHanks2014_slideshow.jpg',
            'https://assets.vogue.com/photos/610940ff232da18f9028ea42/master/w_3000,h_2085,c_limit/GettyImages-1330805915.jpg',
            'https://imagesvc.meredithcorp.io/v3/mm/image?q=85&c=sc&poi=face&w=1500&h=1000&url=https%3A%2F%2Fstatic.onecms.io%2Fwp-content%2Fuploads%2Fsites%2F20%2F2021%2F03%2F02%2FWill-Smith-.jpg',
            'https://media-cldnry.s-nbcnews.com/image/upload/newscms/2019_29/2934096/190715-scarlett-johansson-cs-143p.jpg',
            'https://media.gq-magazine.co.uk/photos/5f44fc7be4b4aa9eec6fce0d/master/pass/20200825-dick.jpg',
            'https://static.wikia.nocookie.net/disney/images/8/8f/Julia_Roberts.jpg/revision/latest?cb=20180701172854',
            'https://cdn.britannica.com/92/215392-050-96A4BC1D/Australian-actor-Chris-Hemsworth-2019.jpg',
            'https://m.media-amazon.com/images/M/MV5BMTkyNDQ3NzAxM15BMl5BanBnXkFtZTgwODIwMTQ0NTE@._V1_UY1200_CR84,0,630,1200_AL_.jpg',
            'https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/natalie-portman-1558430184.jpg',
            'https://m.economictimes.com/thumb/msid-86057629,width-1200,height-900,resizemode-4,imgsize-89456/0248d49e-9e07-42ae-bf6d-a60.jpg',
            'https://i.guim.co.uk/img/media/f6e64e4268c4b039105fe82b2dbb33d38231c29e/124_695_4955_2973/master/4955.jpg?width=1200&height=1200&quality=85&auto=format&fit=crop&s=cab1ded0837ab9a66f4be391d46a09dc',
            'https://www.biography.com/.image/t_share/MTc5ODc1NTM4NjMyOTc2Mzcz/gettyimages-693134468.jpg',
            'https://m.media-amazon.com/images/M/MV5BMjEyMTEyOTQ0MV5BMl5BanBnXkFtZTcwNzU3NTMzNw@@._V1_.jpg',
            'https://m.media-amazon.com/images/M/MV5BMTU0MTQ4OTMyMV5BMl5BanBnXkFtZTcwMTQxOTY1NA@@._V1_UY1200_CR145,0,630,1200_AL_.jpg',
            'https://m.media-amazon.com/images/M/MV5BMTM0ODU5Nzk2OV5BMl5BanBnXkFtZTcwMzI2ODgyNQ@@._V1_.jpg',
            'https://static.wikia.nocookie.net/dcmovies/images/6/61/Ryan_Reynolds.jpg/revision/latest?cb=20190705212505',
            'https://static.wikia.nocookie.net/ironman/images/7/79/Photo%28906%29.jpg/revision/latest/top-crop/width/360/height/450?cb=20141019122536',
            'https://media.vanityfair.com/photos/61081b686a371749ad6428ea/master/w_2560%2Cc_limit/1232535110',
            'https://m.media-amazon.com/images/M/MV5BMTI5NDY5NjU3NF5BMl5BanBnXkFtZTcwMzQ0MTMyMw@@._V1_UY1200_CR94,0,630,1200_AL_.jpg',
            'https://upload.wikimedia.org/wikipedia/commons/c/c2/Chris_Pratt_by_Gage_Skidmore_2.jpg',
            'https://m.media-amazon.com/images/M/MV5BMjExNzA4MDYxN15BMl5BanBnXkFtZTcwOTI1MDAxOQ@@._V1_.jpg',
        ];

        return $posters[array_rand($posters)];
    }
}
