<?php namespace Tests\Repositories;

use App\Models\Artist;
use App\Repositories\ArtistRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ArtistRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ArtistRepository
     */
    protected $artistRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->artistRepo = \App::make(ArtistRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_artist()
    {
        $artist = factory(Artist::class)->make()->toArray();

        $createdArtist = $this->artistRepo->create($artist);

        $createdArtist = $createdArtist->toArray();
        $this->assertArrayHasKey('id', $createdArtist);
        $this->assertNotNull($createdArtist['id'], 'Created Artist must have id specified');
        $this->assertNotNull(Artist::find($createdArtist['id']), 'Artist with given id must be in DB');
        $this->assertModelData($artist, $createdArtist);
    }

    /**
     * @test read
     */
    public function test_read_artist()
    {
        $artist = factory(Artist::class)->create();

        $dbArtist = $this->artistRepo->find($artist->id);

        $dbArtist = $dbArtist->toArray();
        $this->assertModelData($artist->toArray(), $dbArtist);
    }

    /**
     * @test update
     */
    public function test_update_artist()
    {
        $artist = factory(Artist::class)->create();
        $fakeArtist = factory(Artist::class)->make()->toArray();

        $updatedArtist = $this->artistRepo->update($fakeArtist, $artist->id);

        $this->assertModelData($fakeArtist, $updatedArtist->toArray());
        $dbArtist = $this->artistRepo->find($artist->id);
        $this->assertModelData($fakeArtist, $dbArtist->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_artist()
    {
        $artist = factory(Artist::class)->create();

        $resp = $this->artistRepo->delete($artist->id);

        $this->assertTrue($resp);
        $this->assertNull(Artist::find($artist->id), 'Artist should not exist in DB');
    }
}
