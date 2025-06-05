<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                      Forms\Components\Select::make('category_id')
                    ->relationship('category', 'name')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->createOptionForm([
                             Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
               
                Forms\Components\Select::make('parent_category_id')
                    
                    ->relationship('parentCategory', 'name')
                    ->searchable()

                    ->preload()
                    ->default(null),
                Forms\Components\TextInput::make('ordering')
                    ->required()
                    ->numeric()
                    ->default(1000),
                    ])
                    ,
                Forms\Components\RichEditor::make('content')
                    ->required()
                    ->columnSpanFull(),
                    Forms\Components\Select::make('tags')
                        ->relationship('tags', 'name')
                        ->multiple()
                        
                        ->searchable()
                        ->preload()
                        ->default(null)
                        ->createOptionForm([
                             Forms\Components\TextInput::make('name')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('bg_color')
                        ->required()
                        ->maxLength(255),
                        ]),
              
    // FileUpload::make('featured_image')
    // ->disk('public')
    // ->directory('posts')
    // ->required()
    // ->maxSize(1024) // 1MB limit
    // ->afterStateUpdated(function ($state, callable $set) {
    //     Log::info('FileUpload state', ['state' => $state, 'type' => is_object($state) ? get_class($state) : gettype($state)]);
    //     if ($state instanceof \Illuminate\Http\UploadedFile) {
    //         Log::info('Image detected', ['filename' => $state->getClientOriginalName()]);
    //         try {
    //             $manager = new ImageManager(new Driver());
    //             $image = $manager->read($state->getRealPath());
    //             $thumbnail = $image->cover(200, 200);

    //             $filename = pathinfo($state->getClientOriginalName(), PATHINFO_FILENAME);
    //             $extension = $state->getClientOriginalExtension();
    //             $thumbnailName = "{$filename}_thumb.{$extension}";
    //             $thumbnailPath = storage_path("app/public/posts/thumbnails/{$thumbnailName}");

    //             if (!file_exists(storage_path('app/public/posts/thumbnails'))) {
    //                 mkdir(storage_path('app/public/posts/thumbnails'), 0755, true);
    //             }

    //             $thumbnail->save($thumbnailPath, ['quality' => 80]);
    //             $thumbnailPathDb = "posts/thumbnails/{$thumbnailName}";
    //             $set('thumbnail', $thumbnailPathDb); // Set 'thumbnail' as string
    //             Log::info('Thumbnail generated and set', ['thumbnail' => $thumbnailPathDb]);
    //         } catch (\Exception $e) {
    //             Log::error('Thumbnail generation failed: ' . $e->getMessage());
    //             throw new \Exception('Failed to generate thumbnail: ' . $e->getMessage());
    //         }
    //     } else {
    //         Log::error('File not an UploadedFile', ['state' => $state]);
    //     }
    // }),
     Hidden::make('thumbnail'),

                FileUpload::make('featured_image')
                    ->disk('public')
                    ->directory('posts')
                    ->required()
                    ->image()
                    ->afterStateUpdated(function ($state, callable $set) {
                        // This function runs when an image is uploaded.
                        if (! $state instanceof \Illuminate\Http\UploadedFile) {
                            return;
                        }

                        try {
                            // Create the thumbnail
                            $manager = new ImageManager(new \Intervention\Image\Drivers\Gd\Driver());
                            $image = $manager->read($state->getRealPath());
                            $thumbnail = $image->cover(200, 200);

                            // Create a unique name and path for the thumbnail
                            $filename = pathinfo($state->hashName(), PATHINFO_FILENAME);
                            $thumbnailName = "{$filename}_thumb.webp"; // Using .webp is good practice
                            $thumbnailPath = "posts/thumbnails/{$thumbnailName}";

                            // Save the thumbnail to your public disk
                            Storage::disk('public')->put(
                                $thumbnailPath,
                                (string) $thumbnail->toWebp(80) // Encode to a web-friendly format
                            );

                            // 2. SET THE VALUE.
                            // This puts the generated path into the 'thumbnail' Hidden field.
                            $set('thumbnail', $thumbnailPath);

                        } catch (\Exception $e) {
                            // Log error, optionally notify user
                            \Illuminate\Support\Facades\Log::error('Thumbnail generation failed: ' . $e->getMessage());
                        }
                    }),

                // ... your other fields
            
    

           
           
                Forms\Components\TextInput::make('meta_keywords')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('meta_description')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Toggle::make('visibility')
                    ->required()
                  
                    ->default(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('thumbnail_url')
                ->circular(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('user_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('category_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tags')
                    ->searchable(),
                
                Tables\Columns\TextColumn::make('meta_keywords')
                    ->searchable(),
                Tables\Columns\TextColumn::make('meta_description')
                    ->searchable(),
                Tables\Columns\TextColumn::make('visibility')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
