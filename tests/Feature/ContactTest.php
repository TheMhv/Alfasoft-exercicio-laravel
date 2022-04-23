<?php

namespace Tests\Feature;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactTest extends TestCase
{
    protected $contact;
    protected $user;

    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        $this->contact = Contact::factory()->create();
    }

    public function test_index()
    {
        $response = $this->get('/contact');
        $response->assertStatus(200);
    }

    public function test_create()
    {
        $response = $this->actingAs($this->user)->get('/contact/create');
        $response->assertStatus(200);
    }

    public function test_store()
    {
        $data = [
            'name' => 'New Name',
            'contact' => '123456789',
            'email' => 'new.mail@mail.com',
        ];

        $response = $this->actingAs($this->user)->post('/contact', $data);
        $response->assertStatus(302);
        $this->assertDatabaseHas('contacts', $data);
    }

    public function test_store_error()
    {
        $data = [
            'name' => 'Test',
            'contact' => '123',
            'email' => 'test',
        ];

        $response = $this->actingAs($this->user)->post('/contact', $data);
        $response->assertStatus(302);
        $this->assertDatabaseMissing('contacts', $data);
    }

    public function test_show()
    {
        $response = $this->actingAs($this->user)->get('/contact/' . $this->contact->id);
        $response->assertStatus(200);
    }

    public function test_edit()
    {
        $response = $this->actingAs($this->user)->get('/contact/' . $this->contact->id . '/edit');
        $response->assertStatus(200);
    }

    public function test_update()
    {
        $data = [
            'name' => 'New Name',
            'contact' => '123456789',
            'email' => 'new.mail@mail.com',
        ];
        $response = $this->actingAs($this->user)->put('/contact/' . $this->contact->id, $data);
        $response->assertStatus(302);
        $this->assertDatabaseHas('contacts', $data);
    }

    public function test_update_error()
    {
        $data = [
            'name' => 'test',
            'contact' => '123',
            'email' => 'test',
        ];
        $response = $this->actingAs($this->user)->put('/contact/' . $this->contact->id, $data);
        $response->assertStatus(302);
        $this->assertDatabaseMissing('contacts', $data);
    }

    public function test_destroy()
    {
        $response = $this->actingAs($this->user)->delete('/contact/' . $this->contact->id);
        $response->assertStatus(302);
        $this->assertDatabaseMissing('contacts', $this->contact->toArray());
    }
}
