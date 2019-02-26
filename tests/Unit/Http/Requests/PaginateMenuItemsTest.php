<?php namespace Tests\Belt\Menu\Unit\Http\Requests;

use Mockery as m;
use Tests\Belt\Core;
use Belt\Menu\Http\Requests\PaginateMenuItems;
use Illuminate\Database\Eloquent\Builder;

class PaginateMenuItemsTest extends \Tests\Belt\Core\BeltTestCase
{

    use \Tests\Belt\Core\Base\CommonMocks;

    public function tearDown()
    {
        m::close();
    }

    /**
     * @covers \Belt\Menu\Http\Requests\PaginateMenuItems::modifyQuery
     */
    public function test()
    {
        # modifyQuery
        $query = m::mock(Builder::class);
        $query->shouldReceive('where')->once()->with('menu_group_id', 1)->andReturnSelf();
        $query->shouldReceive('withDepth')->once()->andReturnSelf();

        $request = new PaginateMenuItems(['menu_group_id' => 1]);
        $request->modifyQuery($query);
    }

}