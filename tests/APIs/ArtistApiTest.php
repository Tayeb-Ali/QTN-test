<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Artist;

class ArtistApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_artist()
    {
        $artist = factory(Artist::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/artists', $artist
        );

        $this->assertApiResponse($artist);
    }

    /**
     * @test
     */
    public function test_read_artist()
    {
        $artist = factory(Artist::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/artists/'.$artist->id
        );

        $this->assertApiResponse($artist->toArray());
    }

    /**
     * @test
     */
    public function test_update_artist()
    {
        $artist = factory(Artist::class)->create();
        $editedArtist = factory(Artist::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/artists/'.$artist->id,
            $editedArtist
        );

        $this->assertApiResponse($editedArtist);
    }

    /**
     * @test
     */
    public function test_delete_artist()
    {
        $artist = factory(Artist::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/artists/'.$artist->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/artists/'.$artist->id
        );

        $this->response->assertStatus(404);
    }
}
