<?php

namespace App\Http\Controllers\Masters;

use App\Http\Requests\Masters\CreateMasterEconomicSectorsRequest;
use App\Http\Requests\Masters\UpdateMasterEconomicSectorsRequest;
use App\Repositories\Masters\MasterEconomicSectorsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class MasterEconomicSectorsController extends AppBaseController
{
    /** @var  MasterEconomicSectorsRepository */
    private $masterEconomicSectorsRepository;

    public function __construct(MasterEconomicSectorsRepository $masterEconomicSectorsRepo)
    {
        $this->masterEconomicSectorsRepository = $masterEconomicSectorsRepo;
    }

    /**
     * Display a listing of the MasterEconomicSectors.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $masterEconomicSectors = $this->masterEconomicSectorsRepository->paginate(20);

        return view('masters.master_economic_sectors.index')
            ->with('masterEconomicSectors', $masterEconomicSectors);
    }

    /**
     * Show the form for creating a new MasterEconomicSectors.
     *
     * @return Response
     */
    public function create()
    {
        return view('masters.master_economic_sectors.create');
    }

    /**
     * Store a newly created MasterEconomicSectors in storage.
     *
     * @param CreateMasterEconomicSectorsRequest $request
     *
     * @return Response
     */
    public function store(CreateMasterEconomicSectorsRequest $request)
    {
        $input = $request->all();

        $masterEconomicSectors = $this->masterEconomicSectorsRepository->create($input);

        Flash::success('Master Economic Sectors saved successfully.');

        return redirect(route('masters.masterEconomicSectors.index'));
    }

    /**
     * Display the specified MasterEconomicSectors.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $masterEconomicSectors = $this->masterEconomicSectorsRepository->find($id);

        if (empty($masterEconomicSectors)) {
            Flash::error('Master Economic Sectors not found');

            return redirect(route('masters.masterEconomicSectors.index'));
        }

        return view('masters.master_economic_sectors.show')->with('masterEconomicSectors', $masterEconomicSectors);
    }

    /**
     * Show the form for editing the specified MasterEconomicSectors.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $masterEconomicSectors = $this->masterEconomicSectorsRepository->find($id);

        if (empty($masterEconomicSectors)) {
            Flash::error('Master Economic Sectors not found');

            return redirect(route('masters.masterEconomicSectors.index'));
        }

        return view('masters.master_economic_sectors.edit')->with('masterEconomicSectors', $masterEconomicSectors);
    }

    /**
     * Update the specified MasterEconomicSectors in storage.
     *
     * @param int $id
     * @param UpdateMasterEconomicSectorsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMasterEconomicSectorsRequest $request)
    {
        $masterEconomicSectors = $this->masterEconomicSectorsRepository->find($id);

        if (empty($masterEconomicSectors)) {
            Flash::error('Master Economic Sectors not found');

            return redirect(route('masters.masterEconomicSectors.index'));
        }

        $masterEconomicSectors = $this->masterEconomicSectorsRepository->update($request->all(), $id);

        Flash::success('Master Economic Sectors updated successfully.');

        return redirect(route('masters.masterEconomicSectors.index'));
    }

    /**
     * Remove the specified MasterEconomicSectors from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $masterEconomicSectors = $this->masterEconomicSectorsRepository->find($id);

        if (empty($masterEconomicSectors)) {
            Flash::error('Master Economic Sectors not found');

            return redirect(route('masters.masterEconomicSectors.index'));
        }

        $this->masterEconomicSectorsRepository->delete($id);

        Flash::success('Master Economic Sectors deleted successfully.');

        return redirect(route('masters.masterEconomicSectors.index'));
    }
}
