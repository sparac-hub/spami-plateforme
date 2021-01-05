<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        echo " \n ******* Starting database seeder ******* \n";

        // Order is important for data seeding
        $this->call(LocalesTableSeeder::class);
        $this->call(ModulesTableSeeder::class);
        $this->call(ModulePlansTableSeeder::class);
        $this->call(ModuleSchemasTableSeeder::class);
        $this->call(ForumModuleTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(LinkTypesTableSeeder::class);
        $this->call(MenuGroupsTableSeeder::class);
        $this->call(PermissionRouteNameTableSeeder::class);
        // $this->call(MenusTableSeeder::class);
        $this->call(ParameterGroupsTableSeeder::class);
        $this->call(ParametersTableSeeder::class);
        $this->call(AddProcedureToModulesTableSeeder::class);
        $this->call(AddOutilGestionModuleToModulesTableSeeder::class);
        // $this->call(LocationsTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(CountryTranslationsTableSeeder::class);
        /*
         * Keep This Commented we may use them instead of LocationsTableSeeder
         *
        $this->call(GovernoratesTableSeeder::class);
        $this->call(GovernorateTranslationsTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(CityTranslationsTableSeeder::class);
        $this->call(ZonesTableSeeder::class);
        $this->call(ZoneTranslationsTableSeeder::class);*/

        $this->customApp();

        $this->fakeData();
    }

    public function customApp()
    {
        echo " \n ******* Starting CustomApp seeder ******* \n";
        $this->call(CustomAppRolesTableSeeder::class);
    }

    public function fakeData()
    {
        if (config('app.env') == 'local') {
            $this->call(FakeMenuDataTableSeeder::class);
            $this->call(FakeDataTableSeeder::class);
            $this->call(CustomAppFakeDataTableSeeder::class);
            $this->call(HomePortailTableSeeder::class);
            $this->call(WidgetsTableSeeder::class);
        }
    }
}
