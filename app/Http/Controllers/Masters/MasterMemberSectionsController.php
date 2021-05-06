<?php

namespace App\Http\Controllers\Masters;

use App\Http\Requests\Masters\CreateMasterMemberSectionsRequest;
use App\Http\Requests\Masters\UpdateMasterMemberSectionsRequest;
use App\Repositories\Masters\MasterMemberSectionsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class MasterMemberSectionsController extends AppBaseController
{
    /** @var  MasterMemberSectionsRepository */
    private $masterMemberSectionsRepository;

    public function __construct(MasterMemberSectionsRepository $masterMemberSectionsRepo)
    {
        $this->masterMemberSectionsRepository = $masterMemberSectionsRepo;
    }

    /**
     * Display a listing of the MasterMemberSections.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $masterMemberSections = $this->masterMemberSectionsRepository->paginate(20);

        return view('masters.master_member_sections.index')
            ->with('masterMemberSections', $masterMemberSections);
    }

    /**
     * Show the form for creating a new MasterMemberSections.
     *
     * @return Response
     */
    public function create()
    {
        return view('masters.master_member_sections.create');
    }

    /**
     * Store a newly created MasterMemberSections in storage.
     *
     * @param CreateMasterMemberSectionsRequest $request
     *
     * @return Response
     */
    public function store(CreateMasterMemberSectionsRequest $request)
    {
        $input = $request->all();

        $masterMemberSections = $this->masterMemberSectionsRepository->create($input);

        Flash::success('Master Member Sections saved successfully.');

        return redirect(route('masters.masterMemberSections.index'));
    }

    /**
     * Display the specified MasterMemberSections.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $masterMemberSections = $this->masterMemberSectionsRepository->find($id);

        if (empty($masterMemberSections)) {
            Flash::error('Master Member Sections not found');

            return redirect(route('masters.masterMemberSections.index'));
        }

        return view('masters.master_member_sections.show')->with('masterMemberSections', $masterMemberSections);
    }

    /**
     * Show the form for editing the specified MasterMemberSections.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $masterMemberSections = $this->masterMemberSectionsRepository->find($id);

        if (empty($masterMemberSections)) {
            Flash::error('Master Member Sections not found');

            return redirect(route('masters.masterMemberSections.index'));
        }

        return view('masters.master_member_sections.edit')->with('masterMemberSections', $masterMemberSections);
    }

    /**
     * Update the specified MasterMemberSections in storage.
     *
     * @param int $id
     * @param UpdateMasterMemberSectionsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMasterMemberSectionsRequest $request)
    {
        $masterMemberSections = $this->masterMemberSectionsRepository->find($id);

        if (empty($masterMemberSections)) {
            Flash::error('Master Member Sections not found');

            return redirect(route('masters.masterMemberSections.index'));
        }

        $masterMemberSections = $this->masterMemberSectionsRepository->update($request->all(), $id);

        Flash::success('Master Member Sections updated successfully.');

        return redirect(route('masters.masterMemberSections.index'));
    }

    /**
     * Remove the specified MasterMemberSections from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $masterMemberSections = $this->masterMemberSectionsRepository->find($id);

        if (empty($masterMemberSections)) {
            Flash::error('Master Member Sections not found');

            return redirect(route('masters.masterMemberSections.index'));
        }

        $this->masterMemberSectionsRepository->delete($id);

        Flash::success('Master Member Sections deleted successfully.');

        return redirect(route('masters.masterMemberSections.index'));
    }
}
