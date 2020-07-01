<?php

namespace App\Http\Controllers;

use App\Election;
use App\User;
use App\Vote;
use DB;
use App\Charts\ElectionResultChart;
use Illuminate\Http\Request;

class ElectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $elections = Election::all();
        $candidates = User::where('role', 1)->get();
        return view('election/index', compact('candidates','elections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $data = request()->validate([
            'election_title' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'election_description' => 'required',
        ]);

        $candidates_id = User::whereIn('id', $request->election_candidate)->get();
        $election = new Election($data);
        $election->save();
        $election->candidates()->sync($candidates_id);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Election  $election
     * @return \Illuminate\Http\Response
     */
    public function show(Election $election)
    {
        $vote_data = DB::table('candidate_election')->join('votes', 'candidate_election.id', '=', 'votes.candidate_election_id')->where('candidate_election.election_id', $election->id)->get();
        $candidates_names = $election->candidates->pluck('name')->values();
        $vote_query = DB::table('candidate_election')->join('votes', 'candidate_election.id', '=', 'votes.candidate_election_id')->where('candidate_election.election_id', $election->id);
        $data = $vote_query->select('candidate_election_id', DB::raw('count(*) as vote_counts'))->groupBy('candidate_election_id')->get();
        $vote_counts = $data->pluck('vote_counts');

        $chart = new ElectionResultChart;
        $chart->labels($candidates_names);
        $chart->dataset('My dataset', 'bar', $vote_counts);
        return view('election.show', compact('election','vote_data','chart'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Election  $election
     * @return \Illuminate\Http\Response
     */
    public function edit(Election $election)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Election  $election
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Election $election)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Election  $election
     * @return \Illuminate\Http\Response
     */
    public function destroy(Election $election)
    {
        //
    }
}
